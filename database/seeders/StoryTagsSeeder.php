<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class StoryTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'title' => "Romance",
                'slug' => 'romance',
                'cover_photo'=>'romance.svg'
            ],
            [
                'title' => "Action",
                'slug' => 'action',
                'cover_photo'=>'action.svg'
            ],
            [
                'title' => "Tragedy",
                'slug' => 'tragedy',
                'cover_photo'=>'tragedy.svg'
            ],
            [
                'title' => "Comedy",
                'slug' => 'comedy',
                'cover_photo'=>'comedy.svg'
            ],
            [
                'title' => "Drama",
                'slug' => 'drama',
                'cover_photo'=>'drama.svg'
            ],
            
        ];

        foreach($tags as $tag) {
            Tag::create([
                'title' => $tag['title'],
                'slug' =>  $tag['slug'],
                'cover_photo' => $tag['cover_photo']
            ]);
        }

        return;
    }
}
