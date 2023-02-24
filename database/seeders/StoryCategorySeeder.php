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

        foreach($categories as $category) {
            StoryCategory::create([
                'title' => $category['title'],
                'slug' =>  $category['slug']
            ]);
        }

        return;
        
    }
}
