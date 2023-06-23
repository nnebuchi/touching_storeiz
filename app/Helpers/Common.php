<?php

use App\Models\Story;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Str;
use App\Models\StoryCategory;
use App\Models\Tag;

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

    function slugify(String $string){
        return str_replace(' ', '-', $string).'-'.Str::random(5);
    }

    function formatReadTimeCount(Float $value){
        // dd($value);
        if($value < 60){
            return $value." minutes";
        }else{
            return number_format((float)($value/60), 2,'.', ',')." hours";
        }
    }

    function genres(){
        return StoryCategory::all();
    }

    function trendingStories($count){
        return Story::with('cover_photo')->with('tags')->with('author')->withCount('reads')->withCount('recent_reads')->orderBy('recent_reads_count', 'Desc')->paginate($count);
    }

    function story_tags(){
        return Tag::withCount('stories')->get();
    }

    function php_to_html($string){
        return stripslashes(str_ireplace(array("\r","\n",'\r','\n'),"\n\r", $string));
    }

    if (! function_exists('locale')) {
   
        function locale()
        {
            return app()->getLocale();
        }
    }
}
