<?php

namespace App\Services;

use App\Event\WriterCreated;
use App\Models\StoryRead;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public static function becomeAWriter($request){
        if(Auth::check()){
            return self::makeUserAWriter($request);
        }

        $uploaded_photo = FileService::upload($request, 'cover_photo', 'public', 'writers_cover_photos');

        $user = new User();

        $user->first_name = sanitize_input($request->first_name);
        $user->last_name = sanitize_input($request->last_name);
        $user->pen_name = sanitize_input($request->pen_name);
        $user->username = sanitize_input($request->username);
        $user->email = sanitize_input($request->email);
        $user->password = Hash::make(sanitize_input($request->password));
        $user->cover_photo = $uploaded_photo;
        $user->verification_code = Str::random(25);
        $user->is_writer = true;
        $user->verification_expiry_date = strtotime('+3 days');
        $user->save();

        WriterCreated::dispatch($user);

       if(Auth::attempt(['email'=>$user->email, 'password'=>sanitize_input($request->password)])){
            return redirect(route('writer-dashboard'));
       }
        
        // event (new UserCreated(“abc@gmail.com”));
        // dd('saved');

    }

    private static function makeUserAWriter($request){

        $uploaded_photo = FileService::upload($request, 'cover_photo', 'public', 'writers_cover_photos');

        $user = User::where('id', Auth::user()->id)->first();
        $user->is_writer = true;
        $user->first_name = sanitize_input($request->first_name);
        $user->last_name = sanitize_input($request->last_name);
        $user->pen_name = sanitize_input($request->pen_name);
        $user->username = sanitize_input($request->username);
        $user->cover_photo = $uploaded_photo;
        $user->verification_code = Str::random(25);
        $user->is_writer = true;
        $user->verification_expiry_date = strtotime('+3 days');
        WriterCreated::dispatch($user);
        $user->save();
    }

    public static function verifyEmail($request){
        if (!$request->email || !$request->code){
            die('invalid verification link');
        }
        $email = sanitize_input($request->email);
        $code  = sanitize_input($request->code);
        $user = User::where(['email'=>$email, 'verification_code'=>$code])->first();
        if (is_null($user)) {
            die('invalid verification link');
        }
        
        if ($user->verification_expiry_date < time()) {
            // dd('Verification link expired');
            Session(['email'=>$email, 'alert'=>'danger', 'msg'=>'Verification link expired. Kindly request a new verification link by clicking the button below']);
            return redirect(route('unverified-email'));
        }

        $user->email_verified_at = date('Y-m-d h:m:i', time());
        $user->save();
        
        Session(['msg'=>'Email Successfully verified', 'alert'=>'success']);

        // return redirect()->route('writer-dashboard');
        return redirect()->route('add-story-form');
    }

    public function updateUserRead(String $token){
        $reads = StoryRead::where('browser_cookie', $token)->whereNull('user_id')->get();
        // dd($reads);
        foreach($reads as $read){
            $read->user_id = Auth::user()->id;
            $read->save();
        }
        return;
    }
}