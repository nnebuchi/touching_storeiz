<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Services\UserService;

class AuthService
{
    public static function login($request){
        if(Auth::attempt(['email'=>sanitize_input($request->email), 'password'=>sanitize_input($request->password)], true)){
            
            $request->session()->regenerate();
            UserService::updateUserRead($request->user_token);
            return redirect()->back();
        }
        Session(['msg'=>'Invalid Login Credentials', 'alert'=>'danger']);
        return redirect()->back();
    }


    public static function register(Request $request){
        $user = new User();

        $user->username = sanitize_input($request->username);
        $user->email = sanitize_input($request->email);
        $user->password = Hash::make(sanitize_input($request->password));
        $user->save();

        if(Auth::attempt(['email'=>$user->email, 'password'=>sanitize_input($request->password)], true)){
            return redirect()->back();
       }
    }
}