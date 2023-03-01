<?php

namespace App\Http\Controllers;

use App\Services\PagesService;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        return PagesService::about();
    }
}
