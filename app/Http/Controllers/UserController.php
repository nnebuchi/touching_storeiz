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

    public function updateProfile(Request $request){
        $validationData = [
            'first_name'=>'required',
            'last_name'=>'required',
            'cover_photo'=>'mimes:jpeg,jpg,png'
        ];

        if(Auth::user()->is_writer){
            $validationData['pen_name'] = Auth::user()->pen_name != $request->pen_name ? 'required|unique:users' : 'required';
        }
            
        $request->validate($validationData);

        return UserService::updateProfile($request);
    }

    public function editProfile(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('writer.edit-profile')->with(['user'=>$user]);
    }
}
