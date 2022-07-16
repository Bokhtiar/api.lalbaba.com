<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordReset;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    use ApiResponseTrait;
   
    /*regestration */
    public function register (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $request['password']=Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];

        $welcome = [
            'title' => 'Thanks for registration our Lalbaba Website',
            'body' => 'A welcome email is the first impression a company makes with a new customer',
            ];
            \Mail::to($request->email)->send(new WelcomeMail($welcome));

        return response($response, 200);
    }
    /*Login */
    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" =>'User does not exist'];
            return response($response, 422);
        }
    }
     /*profile*/
    public function userProfile() {
        return response()->json(auth()->user());
    }
     /*reset Password*/
    public function resetPassword(Request $request){
        $existEmail = User::where('email', $request->email)->first();
       
        if(!$existEmail){
            $message = "Email Is Invalid";
            return $this->ErrorResponse($message);
        }
        $newPassword = rand(10000000,99999999);
        $existEmail->password = Hash::make($newPassword);
        $existEmail->save();

        $details = [
            'title' => 'Mail from localhost.com',
            'body' => 'Already forget your password form lalbaba.com, now your new password,your can change this password form change password menu',
            'newPassword' => $newPassword
            ];
            \Mail::to($request->email)->send(new PasswordReset($details));
            $message = "New Password Send Your Mail...";
            return $this->SuccessResponse($message);
    }
     /*change Password*/
    public function changePassword(Request $request){
        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required|confirmed',
          ]);
        
          $hashedpassword=Auth::user()->password;
            if (Hash::check($request->old_password,$hashedpassword)) {
               
                if(!Hash::check($request->password,$hashedpassword)){
                  $user=User::find(Auth::id());
                  $user->password=Hash::make($request->password);
                  $user->save();
                  $this->logout($request);
                  $message = "Password Change Successfully...!";
                  return $this->SuccessResponse($message);
                }
                else {
                  $message = "Please Enter Your Valid Password";
                  return $this->ErrorResponse($message);
                }
            }else {
                $message = "Don't Match Your Password";
                return $this->ErrorResponse($message);
            }
    }
     /*logout*/
    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }


}
