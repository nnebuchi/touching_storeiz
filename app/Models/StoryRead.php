<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryRead extends Model
{
    use HasFactory;

    public function story(){
        return $this->belongsTo(Story::class);
    }

    public function writer(){
        return $this->story()->first()->author();
    }
}
