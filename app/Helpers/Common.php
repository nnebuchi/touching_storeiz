<?php

use Laravel\Sanctum\PersonalAccessToken;

if (!function_exists('generateOTP')) {
    /**
     * Undocumented function
     *
     * @param  int $length
     * @return void
     */
    function generateOTP()
    {   
        // Generates Random number between given pair
        return mt_rand(100000,999999);
    }

    function returnValidationError(string $errors, string $message){
        $errors = json_decode($errors, true);
        // return $validator->errors();
        foreach($errors as $key=>$err){
            return json_encode([
                'status'    => 'fail',
                'message'   => $message,
                'error'     =>  $err[0]
            ]); // Status code here
            break;
        }
    }

    function getUser($request){
        $token = PersonalAccessToken::findToken($request->bearerToken());
        return $token->tokenable;
    }
}
