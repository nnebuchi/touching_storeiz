<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Story extends Model
{
    use HasFactory;

    public function media(){
        return $this->belongsToMany(File::class);
    }

    public function cover_photo(){
        return $this->belongsToMany(File::class)->where('is_cover', 1);
    }

    public function tags($count=null){
        if($count == null){
            return $this->belongsToMany(Tag::class);
        }else{
            return $this->belongsToMany(Tag::class)->limit($count)->get();
        }
        
    }

    public function story_category(){
        return $this->belongsTo(StoryCategory::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes(){
        return $this->hasMany(StoryLike::class)->where('like_type', 'positive');
    }

    public function dislikes(){
        return $this->hasMany(StoryLike::class)->where('like_type', 'negative');
    }

    public function current_user_like(){
        return $this->hasOne(StoryLike::class)->where('user_id', Auth::user()->id);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at', 'Desc');
    }

    public function reads(){
        return $this->hasMany(StoryRead::class);
    }

    public function read_hours(){
        return $this->hasMany(StoryRead::class)->sum('time_spent');
    }

    public function recent_reads(){
        return $this->hasMany(StoryRead::class)->where('created_at', '>=', Carbon::now()->subDays(6)->toDateTimeString());
    }
}
