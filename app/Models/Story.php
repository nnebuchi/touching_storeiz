<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
