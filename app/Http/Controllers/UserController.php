<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function becomeWriter(Request $request){
        
        $data = [
            'first_name'=>'required',
            'last_name'=>'required',
            'pen_name'=>'required|unique:users',
            'email'=> Auth::check() ? 'required|email' : 'required|email|unique:users',
            'cover_photo'=>'mimes:jpeg,jpg,png',
            'password'=>'min:8'
        ];

        $request->validate($data);
        // dd($request);
       return UserService::becomeAWriter($request);
    }

    public function verifyEmail(Request $request){
        return UserService::verifyEmail($request);
        
        // 2021-12-10 08:26:24
    }

    public function dashboard(){
        return 'Writers Dashboard is under construction';
    }

    
}
