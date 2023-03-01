<?php

namespace App\Http\Controllers;

use App\Services\StoryService;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function showAddForm(){
        return StoryService::showAddForm();
    }

    public function add(Request $request){
        $request->validate([
            'title'=>'required',
            'tags'=>'required',
            'story'=>'required|min:200',
            'cover_photo'=>'required|mimes:jpeg,jpg,png|max:1024'
        ]);
        return StoryService::add($request);
    }

    public function ManageStory(Request $request){
       return StoryService::ManageStory($request->slug);
    }

    public function EditStory(Request $request){
       return StoryService::EditStory($request->slug);
    }

    public function update(Request $request){
        
        $request->validate([
            'title'=>'required',
            'tags'=>'required',
            'story'=>'required|min:200',
            'cover_photo'=>'mimes:jpeg,jpg,png|max:1024'
        ]);

        return StoryService::update($request);
    }

    public function index(Request $request){
        return StoryService::index($request, 2);
    }

    public function read(Request $request){
        return StoryService::read($request);
    }

    public function moreStory(Request $request){
        return StoryService::moreStory($request);
    }
}
