<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function login(Request $request){
        
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        return AuthService::login($request);
    }

    public function register(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8',
            'username'=>'required'
        ]);
        return AuthService::register($request);
    }

    public function resendVerificationMail(){
        return AuthService::resendVerificationMail();
    }

    // public function saveUserToken(Request $request){
    //     return AuthService::saveUserToken($user);
    // }
}
