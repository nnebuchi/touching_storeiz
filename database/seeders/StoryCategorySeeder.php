<?php

namespace Database\Seeders;

use App\Models\StoryCategory;
use Illuminate\Database\Seeder;

class StoryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => "Drama",
                'slug' => 'drama',
            ],
            [
                'title' => "Prose",
                'slug' => 'prose',
            ],
            [
                'title' => "Poetry",
                'slug' => 'poetry',
            ]
            
        ];

        foreach($categories as $category) {
            StoryCategory::create([
                'title' => $category['title'],
                'slug' =>  $category['slug']
            ]);
        }

        return;
        
    }
}
