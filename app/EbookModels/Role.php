<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'permissions',
    ];
    
    protected $slugAttribute = 'name';
    
    
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }


    
    /**
     * Get a list of all roles.
     *
     * @return array
     */
    public static function list()
    {
        return static::get()->pluck('name', 'id');
    }
}
