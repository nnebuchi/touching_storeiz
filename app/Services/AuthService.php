<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public static function login($request){
        if(Auth::attempt(['email'=>sanitize_input($request->email), 'password'=>sanitize_input($request->password)])){
            $request->session()->regenerate();
            return redirect(route('add-story-form'));
        }
        Session(['msg'=>'Invalid Login Credentials', 'alert'=>'danger']);
        return redirect()->back();
    }
}