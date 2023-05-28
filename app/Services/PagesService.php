<?php
namespace App\Services;

use App\Models\Story;

class PagesService
{
    public static function about(){
        $data['stories'] = trendingStories(10);
        // dd($data['stories']);
        // trendingStories(5)
        return view('pages.about')->with($data);
    }
}