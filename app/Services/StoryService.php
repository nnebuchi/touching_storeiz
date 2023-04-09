<?php

namespace App\Services;

use App\Models\File;
use App\Models\Story;
use App\Models\Tag;
use App\Models\FileStory;
use App\Models\Comment;
use App\Models\StoryLike;
use App\Models\StoryRead;
use App\Models\StoryTag;
use App\Models\StoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class StoryService
{
    public static function showAddForm(){
        $data['tags'] = Tag::all();
        $data['categories'] = StoryCategory::all();
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
        $story->story_category_id = sanitize_input($request->genre);
        $story->save();

        self::add_story_media($story, $story_cover, true);

        self::add_story_tags($story, sanitize_input($request->tags));
        
        return redirect()->route('my-stories', $story->slug);
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
        
        $stories = Story::with('author')->with('tags');
        
        if($request->tag){
            $tag = Tag::where('slug', $request->tag)->first();
            if($tag){
                $data['request_tag'] = $tag->title;
                $stories = $stories->whereHas('tags', function ($q) use($tag) {
                    return $q->whereIn('slug', $tag); 
                })
                ->with(array('author'=>function($query){
                    $query->select('id', 'pen_name');
                }));
            }
        }

        if($request->genre){
            
            $genre = StoryCategory::where('slug', $request->genre)->first();
            
            if($genre){
                $data['request_genre'] = $genre->title;
                $stories = $stories->whereHas('story_category', function ($q) use($genre) {
                    return $q->whereIn('slug', $genre); 
                });
                // ->with(array('author'=>function($query){
                //     $query->select('id', 'pen_name');
                // }));
            }
        }
        
        $stories = $stories->with('cover_photo')->with('likes')->with('comments')->with('reads');
        
        if(Auth::check()){
            $stories = $stories->with('current_user_like');
        }
        
        $data['stories']  = $stories->paginate($page_count);

        $data['tags'] = Tag::withCount('stories')->get();

        $data['trending_stories'] = Story::with('author')->withCount('reads')->withCount('recent_reads')->orderBy('recent_reads_count', 'Desc')->paginate(5);

        return view('story.index')->with($data);
    }

    //   public static function moreStory($currentPage, $lastPage, $totalItem, $perPage){
    public static function moreStory(Request $request){
        $stories = Story::with('tags');
        if($request->tag){
            
            $tag = Tag::where('slug', $request->tag)->first();
            
            if($tag){
                $data['request_tag'] = $tag->title;
                $stories = $stories->whereHas('tags', function ($q) use($tag) {
                    return $q->whereIn('slug', $tag); 
                });
                // ->with(array('author'=>function($query){
                //     $query->select('id', 'pen_name');
                // }));
            }
        }
       

        if($request->genre){
            
            $genre = StoryCategory::where('slug', $request->genre)->first();
            
            if($genre){
                $data['request_genre'] = $genre->title;
                $stories = $stories->whereHas('story_category', function ($q) use($genre) {
                    return $q->whereIn('slug', $genre); 
                });
            }
        }

        $data = $stories->with('author')->with('cover_photo')->with('likes')->with('current_user_like')->with('comments')->with('reads')->paginate(env('STORIES_PER_PAGE'));
        return Response::json([
            'status'=>'success',
            'stories'=>$data
        ], 200);
    }

    public static function read(Request $request){

        if(Auth::check()){
            $data['story'] = $story = Story::with('cover_photo')->with('likes')->with('current_user_like')->with('comments')->with('reads')->where('slug', $request->slug)->firstOrFail();
            $data['user_id'] = Auth::user()->id; 
        }else{
            $data['story'] = $story = Story::with('cover_photo')->where('slug', $request->slug)->firstOrFail();
        }

        $related = $data['related'] = Story::whereHas('tags', function ($q) use ($story) {
            return $q->whereIn('title', $story->tags->pluck('title')); 
        })
        ->where('id', '!=', $story->id) // So you won't fetch same post
        ->get();
     
        return view('story.read')->with($data);
    }

    public static function like(Request $request){
        // check for existing like 
        $story_like = StoryLike::where(['user_id'=>Auth::user()->id, 'story_id'=>$request->story_id])->first();

        if(!$story_like){
            // if no existing like, create new one
            $story_like = new StoryLike;
        }else{
            // if there is an existing like, delete it
            StoryLike::where(['user_id'=>Auth::user()->id, 'story_id'=>$request->story_id])->delete();
            return Response::json([
                'status'=>'success'
            ], 200);

        }
        
        $story_like->user_id = Auth::user()->id;
        $story_like->story_id = sanitize_input($request->story_id);
        $story_like->like_type = sanitize_input($request->like_type);

        $story_like->save();

        
        return Response::json([
            'status'=>'success'
        ], 200);
    }

    public static function addComment(Request $request){
        $comment = new Comment;
        $comment->story_id = sanitize_input($request->story_id);
        $comment->user_id = Auth::user()->id;
        $comment->content = sanitize_input($request->content);
        $comment->save();

        $recent_comments =  Comment::where('story_id', $comment->story_id)->with('user')->where('deleted', 0)->orderBy('created_at', 'Desc')->paginate(50);
        $comment_readable_time = [];
        foreach($recent_comments as $key=>$comment){
            $comment_readable_time[$key] = $comment->created_at->diffForHumans();

        }


        // $recent_comments_f =array_map('formatTime', $recent_comments);
        return Response::json([
            'status'=>'success',
            'comments'=>$recent_comments,
            'comment_dates'=>$comment_readable_time
        ], 200);
    }

    function formatTime($row){
        $row->created_at = $row->created_at->diffForHumans();
        return $row;
    }
    public static function updateComment(Request $request){
        $comment = Comment::where(['id'=>$request->id, 'user_id'=>Auth::user()->id])->first();
        if(!$comment){
            return Response::json([
                'status'=>'fail',
                'comment not found'
            ], 404);
        }
        $comment->content = sanitize_input($request->content);
        $comment->save();
        return Response::json([
            'status'=>'success'
        ], 200);
    }

    public static function deleteComment(Request $request){
        $comment = Comment::where(['id'=>$request->id, 'user_id'=>Auth::user()->id])->first();
        if(!$comment){
            return Response::json([
                'status'=>'fail',
                'comment not found'
            ], 404);
        }
        Comment::where(['id'=>$request->id, 'user_id'=>Auth::user()->id])->delete();
        
        return Response::json([
            'status'=>'success'
        ], 200);
    }

    public static function recordRead(Request $request){

        $story = Story::where('slug', $request->slug)->first();

        if($story){

            $read = new StoryRead;
            $read->story_id = $story->id;
            $read->browser_cookie = sanitize_input($request->browser_cookie);
            $read->user_id = Auth::check() ? Auth::user()->id: null;
            $read->time_spent = 1;
            $read->save();

            return Response::json([
                'status' => 'success',
                'message'=>'read recorded'
            ], 200);  
           
        }

        return Response::json([
            'status' => 'fail',
            'message'=>'Story not found'
        ], 404);  
    }

    public static function updateReadRecord(Request $request){
        if(Auth::check()){
            $read = StoryRead::where(['user_id'=>Auth::user()->id])->latest()->first();
       }else{
           $read = StoryRead::where(['browser_cookie'=>$request->browser_cookie])->latest()->first();
       }

       if($read){
            $read->time_spent = $read->time_spent + 1;
            $read->save();

            return Response::json([
                'status' => 'success',
                'message'=>'read recorded updated'
            ], 200);  
       }

       return Response::json([
            'status' => 'fail',
            'message'=>'Read instance not found'
        ], 404);  
    }

    public static function trendingStories(Request $request){
        return Response::json([
            'status'=>'success',
            'data'=>Story::withCount('recent_reads')->orderBy('recent_reads_count', 'Desc')->paginate(5)
        ], 200);
    }

    public static function list(){
        $data['stories'] = Story::withCount('likes')->withCount('dislikes')->withCount('comments')->withCount('reads')->with('reads')->with('tags')->where('user_id', Auth::user()->id)->paginate(env('STORIES_PER_PAGE'));
        return view('story.list')->with($data);
    }

    //  public function getComments(Request $request){
        // return Response::json([
        //     'status'=>'success',
        //     'comments'=>Comment::where(['id'=>$request->id])->get()
        // ], 200);
    // }
}