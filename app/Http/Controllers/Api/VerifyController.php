<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VerifyController extends Controller
{
    use ApiResponseTrait;

    public function emailVerification(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        
        //dd($request->all());
        $existEmail = User::where('email', $request->email)->first();
        if($existEmail){
            $message = "Email Already Register";
            return $this->ErrorResponse($message);
        }

        $verifyCode = rand(10000000,99999999);

        $account = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'verify_code' => $verifyCode
        ]);
        

        $details = [
            'title' => 'Mail from localhost.com',
            'body' => 'verify code',
            'VerifyCode' => $verifyCode
            ];
            \Mail::to($request->email)->send(new VerifyMail($details));
            $message = "Verify Code Send Your Mail...";
            return $this->SuccessResponse($message);

        
    }
}
