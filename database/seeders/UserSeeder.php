<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => "Nnebuchi",
                'last_name' => 'Osigbo',
                'pen_name' => 'Great',
                'username' => 'Nnesco',
                'email' => 'nnebuchiosigbo340@gmail.com',
                'email_verified_at' => '2023-01-05 07:01:16',
                'password'=>Hash::make('nnesco100'),
                'is_writer'=>true,
                'cover_photo'=>'writers_cover_photos/Gbilepng_1672902882.png',
                'verification_code'=> Str::random(25),
                'verification_expiry_date'=> strtotime('+3 days')
            ]
            
        ];

        foreach($users as $user) {
            $new_user = new User;
            
            foreach ($user as $key => $value) {
                 $new_user->{$key} = $value;
            }

            $new_user->save();
           
            // User::create([
            //     'title' => $user['title'],
            //     'slug' =>  $user['slug']
            // ]);
        }

        return;
    }
}
