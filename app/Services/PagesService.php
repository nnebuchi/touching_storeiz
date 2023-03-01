<?php
namespace App\Services;

use App\Models\Story;

class PagesService
{
    public function about(){
        $data['stories'] = Story::with('cover_photo')->with('tags')->where(['published'=>0, 'approval_status'=>'approved'])->orderBy('id', 'desc')->limit(10)->get();
        // dd($data['stories']);
        return view('pages.about')->with($data);
    }
}