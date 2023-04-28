<?php

namespace App\Http\Controllers;

use App\Services\StoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoryController extends Controller
{
    public function showAddForm(){
        return StoryService::showAddForm();
    }

    public function add(Request $request){
        $request->validate([
            'title'=>'required',
            'tags'=>'required',
            'genre'=>'required',
            'story'=>'required|min:200',
            'cover_photo'=>'required|mimes:jpeg,jpg,png'
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
        return StoryService::index($request, env('STORIES_PER_PAGE'));
    }

    public function read(Request $request){
        return StoryService::read($request);
    }

    public function getStoryDetail(Request $request){
        return StoryService::getStoryDetail($request);
    }

    public function moreStory(Request $request){
        return StoryService::moreStory($request);
    }

    public function like(Request $request){
        return StoryService::like($request);
    }

    public function addComment(Request $request){
        $validator = Validator::make($request->all(),[
            'content'   => 'required',
            'story_id'  => 'required',
        ]);
        
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Commenting Failed');
        }
        return StoryService::addComment($request);
    }
    
    public function updateComment(Request $request){
        $validator = Validator::make($request->all(), [
            'content'   => 'required',
            'id'  => 'required',
        ]);
        
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Commenting Failed');
        }
        return StoryService::updateComment($request);
    }

    public function deleteComment(Request $request){
        $validator = Validator::make($request->all(), [
            'id'  => 'required',
        ]);
        
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Commenting Failed');
        }
        return StoryService::deleteComment($request);
    }

    public function recordRead(Request $request){
        $validator = Validator::make($request->all(),[
            'browser_cookie'   => 'required'
        ]);
        
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Recording stor read failed');
        }
        return StoryService::recordRead($request);
    }

    public function updateReadRecord(Request $request){
        $validator = Validator::make($request->all(),[
            'browser_cookie'   => 'required'
        ]);
        
        if ($validator->fails()) {
            return returnValidationError($validator->errors(), 'Recording stor read failed');
        }
        return StoryService::updateReadRecord($request);
    }

    public function trendingStories(Request $request){
        return StoryService::trendingStories($request);
    }

    public function list(){
        return StoryService::list();
    }
}
