<?php

namespace App\Http\Controllers;

use App\Services\PagesService;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Setting;

class PagesController extends Controller
{
    public function about(){
        return PagesService::about();
    }
    
    // public function terms(){
    //     return PagesService::terms();
    // }
    public function setup(){
        $this->createCustomerRole();
        $this->setApplicationSettings();
    }

    private function createCustomerRole()
    {
        Role::create(['slug'=>'user','name' => 'User','permissions' => json_encode($this->getUserRolePermissions())]);
    }

    private function setApplicationSettings()
    {
        Setting::setMany([
            'active_theme' => 'Cynoebook',
            'supported_locales' => ['en'],
            'default_locale' => 'en',
            'default_timezone' => 'UTC',
            'user_role' => '2',
            'daily_ebook_upload_limit' => '5',
            'auto_approve_user' => '1',
            'cookie_bar_enabled' => '1',
            'enable_comment' => '1',
            'member_only_reading_books' => '0',
            'enable_ebook_report' => true,
            'enable_ebook_print' => true,
            'enable_ebook_download' => true,
            'enable_ebook_upload' => true,
            'enable_registrations' => true,
            'reviews_enabled' => true,
            'auto_approve_reviews' => true,
            //'cynoebook_copyright_text' => 'Copyright © <a href="{{ site_url }}">{{ site_name }}</a> {{ year }}. All rights reserved.',
            'cynoebook_copyright_text' => 'Copyright © {{ site_name }} {{ year }}. All rights reserved.',
            'allowed_file_types' => ['pdf','epub','docx','doc','txt','mp3','wav'],
            'theme_logo_header_color' => 'blue',
            'theme_navbar_header_color' => 'blue2',
            'theme_sidebar_color' => 'white',
            'theme_background_color' => 'bg1',
        ]);
        
    }

     /**
     * Get user role permissions.
     *
     * @return array
     */
    private function getUserRolePermissions()
    {
        return [];
    }
}
