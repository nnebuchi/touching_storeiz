<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/unverified-email', function () {
   dd('Verify Email');
})->name('unverified-email');

Route::post('/request-verification-link', function () {
   dd('Verify Email');
})->name('request-verification-link');

Route::get('/verify-email/{email}/{code}', [UserController::class, 'verifyEmail'])->name('verify-email');

Route::group(['prefix' => 'writer'], function () {

    Route::get('/new', function () {
        return view('writer.new');
    })->name('become-a-writer');

    Route::post('/new', [UserController::class, 'becomeWriter'])->name('writer.new');

    Route::group(['middleware' => ['verified_writer']], function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('writer-dashboard');
    });
});

Route::group(['prefix' => 'story'], function () {

    Route::get('/new', [StoryController::class, 'showAddForm'])->name('add-story-form');
    
    Route::post('/add', [StoryController::class, 'add'])->name('add-story');
});