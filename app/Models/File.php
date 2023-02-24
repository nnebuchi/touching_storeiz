<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public function stories(){
        return $this->belongsToMany(Story::class);
    }

    // public function stories(){
    //     return $this->belongsToMany(Story::class);
    // }
}
