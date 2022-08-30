<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    /**admin information details show */
    public function info(){
        return view('admin.setting.info');
    }

    /**accounts information with password update */
    public function account()
    {
        $user = Auth::user();
        return view('admin.setting.account', compact('user'));
    }

    /**update profile  */
    public function accountUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Updated Successfully Done');
    }

    /**password change  */
    public function changePassword(Request $request)
    {
      
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
                  Auth::logout();
                  return redirect()->route('login')->with('success', "Password Change Successfully...");
                }
                else {
                  return redirect()->back()->with('success', "Not Matched Password");
                }
            }else {
                return redirect()->back()->with('success', "Not Matched Password");
            }
    }
}
