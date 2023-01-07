<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function showAddForm(){
        return view('story.add');
    }

    public function add(Request $request){
        return view('story.add');
    }
}
