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
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'pen_name'=>'required',
            'email'=>'required|email',
            'cover_photo'=>'required|mimes:jpeg,jpg,png|max:1024',
            'password'=>'min:8'
        ]);
        // dd($request);
       return UserService::becomeAWriter($request);
    }

    public function verifyEmail(Request $request){
        return UserService::verifyEmail($request);
        
        // 2021-12-10 08:26:24
      }

    
}
