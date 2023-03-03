<?php

namespace App\Services;

use App\Models\File;
use App\Models\Story;
use App\Models\Tag;
use App\Models\FileStory;
use App\Models\StoryTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class StoryService
{
    public static function showAddForm(){
        $data['tags'] = Tag::all();
        return view('story.add')->with($data);
    }


    public static function add(Request $request){
        //dd($request);
        $uploaded_photo = FileService::upload($request, 'cover_photo', 'public', 'stories_cover_photos');

        $story_cover = FileService::addmedia($uploaded_photo);
        
        $story = new Story;
        $story->user_id = Auth::user()->id;
        $story->title = sanitize_input($request->title);
        $story->slug = slugify($request->title);
        $story->content = $request->story;
        $story->save();

        self::add_story_media($story, $story_cover, true);

        self::add_story_tags($story, sanitize_input($request->tags));
        
        return redirect()->route('manage-story', $story->slug);
    }


    public static function add_story_media(Story $story, File $media, $is_cover = false){
        
         $story_media = new FileStory;
         $story_media->story_id = $story->id;
         $story_media->user_id = $story->user_id;
         $story_media->is_cover = $is_cover;
         $story_media->file_id = $media->id;
         $story_media->save();
        
         return;
    }

    private static function add_story_tags(Story $story, Array $tags){
        foreach ($tags as $key => $tag) {

            $story_tag = new StoryTag;

            $story_tag->story_id = $story->id;
            $story_tag->tag_id = $tag;

            $story_tag->save();
        }

        return;
    }

    private static function update_story_tags(Story $story, Array $tags){

        $old_tags_count = StoryTag::where('story_id', $story->id)->count();

        if($old_tags_count > 0){
            StoryTag::where('story_id', $story->id)->delete();
        }

        foreach ($tags as $key => $tag) {

            $story_tag = new StoryTag;

            $story_tag->story_id = $story->id;
            $story_tag->tag_id = $tag;

            $story_tag->save();
        }

        return;
    }

    public static function update_story_cover_photo(Story $story, File $media){
        
        $old_file_story = FileStory::where(['story_id'=>$story->id, 'is_cover'=>true])->get();
        if(count($old_file_story) > 0){
            foreach ($old_file_story as $file_story) {
                $file_story->is_cover = false;
                $file_story->save();
            }
            
        }

        $story_media = new FileStory;
        $story_media->story_id = $story->id;
        $story_media->user_id = $story->user_id;
        $story_media->is_cover = true;
        $story_media->file_id = $media->id;
        $story_media->save();
       
        return;
   }

    public static function ManageStory(String $slug){
      
        $story = Story::where('slug', $slug)->with('media')->with('tags')->first();
        dd($story);
    }

    public static function EditStory(String $slug){
        $story = $data['story'] = Story::where('slug', $slug)->with('media')->with('tags')->with('cover_photo')->firstOrFail();
        $story_tag_ids = [];
        foreach ($story->tags as $tag) {
            array_push($story_tag_ids, $tag->id);
        }
        // dd($story->tags);
        $data['story_tag_ids'] = $story_tag_ids;
        $data['tags'] = Tag::all();
        return view('story.edit')->with($data);
        
    }

    public static function update(Request $request){
        $story = Story::where('slug', $request->slug)->with('cover_photo')->firstOrFail();
        if($story->user_id != Auth::user()->id){
            Session([
                'msg'=>'Unauthorised access',
                'alert'=>'danger'
            ]);

            return redirect()->back();
        }

        if($request->hasFile('cover_photo')){
            $uploaded_photo = FileService::upload($request, 'cover_photo', 'public', 'stories_cover_photos');
            $story_cover = FileService::addmedia($uploaded_photo);
        }
        
        $story->title = sanitize_input($request->title);
        $story->slug = slugify($request->title);
        $story->content = $request->story;
        $story->save();
        
        if($request->hasFile('cover_photo')){
            self::update_story_cover_photo($story, $story_cover);
        }
       
        self::update_story_tags($story, sanitize_input($request->tags));
        Session([
            'msg'=>'Story successful updated',
            'alert'=>'success'
        ]);

        return redirect()->route('manage-story', $story->slug);
    }

    public static function index(Request $request, Int $page_count){
        if($request->tag){
            $tag = Tag::where('slug', $request->tag)->first();
            if($tag){
                $data['request_tag'] = $tag->title;
                $stories = Story::whereHas('tags', function ($q) use($tag) {
                    return $q->whereIn('slug', $tag); 
                })
                ->with(array('author'=>function($query){
                    $query->select('id', 'pen_name');
                }));
            }
        }else{
            $stories = Story::with('author')->with('tags');
        }
        

        $data['stories']= $stories->with('cover_photo')->paginate($page_count);
        $data['tags'] = Tag::all();
        // dd($data['stories']);
        return view('story.index')->with($data);
    }

    //   public static function moreStory($currentPage, $lastPage, $totalItem, $perPage){
    public static function moreStory(Request $request){
        if($request->tag){
            
            $tag = Tag::where('slug', $request->tag)->first();
            
            if($tag){
                $data['request_tag'] = $tag->title;
                $stories = Story::whereHas('tags', function ($q) use($tag) {
                    return $q->whereIn('slug', $tag); 
                });
                // ->with(array('author'=>function($query){
                //     $query->select('id', 'pen_name');
                // }));
            }
        }else{
            $stories = Story::with('tags');
        }
        $data = $stories->with('author')->with('cover_photo')->paginate(2);
        return Response::json([
            'status'=>'success',
            'stories'=>$data
        ], 200);
    }

    public static function read(Request $request){
        
        $data['story'] = Story::with('cover_photo')->where('slug', $request->slug)->firstOrFail();
        return view('story.read')->with($data);
    }
}