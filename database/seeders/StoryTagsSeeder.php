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
            ],
            [
                'title' => "Action",
                'slug' => 'action',
            ],
            [
                'title' => "Tragedy",
                'slug' => 'tragedy',
            ],
            [
                'title' => "Comedy",
                'slug' => 'comedy',
            ],
            [
                'title' => "Drama",
                'slug' => 'drama',
            ],
            
        ];

        foreach($tags as $tag) {
            Tag::create([
                'title' => $tag['title'],
                'slug' =>  $tag['slug']
            ]);
        }

        return;
    }
}
