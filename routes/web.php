<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [StoryController::class, 'index'])->name('home');

Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/unverified-email', function () {
   return view('auth.verify_email');
})->name('unverified-email');

Route::post('/request-verification-link', [AuthController::class, 'resendVerificationMail'])->name('request-verification-link');

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
    
    Route::group(['middleware' => ['auth']], function () {
          
        Route::post('/{slug}/like', [StoryController::class, 'like'])->name('like-story');
        Route::post('/{slug}/add-comment', [StoryController::class, 'addComment'])->name('story.add_comment');
        Route::post('/update-comment', [StoryController::class, 'updateComment'])->name('update-comment');
        Route::post('/delete-comment', [StoryController::class, 'deleteComment'])->name('delete-comment');
        
        Route::group(['middleware' => ['verified_writer']], function () {
            Route::get('/new', [StoryController::class, 'showAddForm'])->name('add-story-form');

            Route::post('/add', [StoryController::class, 'add'])->name('add-story');

            Route::get('/mine', [StoryController::class, 'list'])->name('my-stories');

            Route::get('/mine/{slug}', [StoryController::class, 'ManageStory'])->name('manage-story');

            Route::get('/mine/{slug}/edit', [StoryController::class, 'EditStory'])->name('edit-story');

            Route::post('/update', [StoryController::class, 'update'])->name('update-story');
        });
    });


    Route::get('/', [StoryController::class, 'index'])->name('stories');

    Route::get('/more', [StoryController::class, 'moreStory'])->name('more-story');

    Route::get('/{slug}', [StoryController::class, 'read'])->name('read-story');

    Route::post('/{slug}/record/read', [StoryController::class, 'recordRead'])->name('record-story-read');
    
    Route::post('/{slug}/update-read-record', [StoryController::class, 'updateReadRecord'])->name('update-read-record');
});

Route::group(['prefix' => 'tickets', 'middleware' => ['auth']], function () {
    Route::get('/new', [TicketController::class, 'new'])->name('new-ticket');
    Route::post('/submit', [TicketController::class, 'submit'])->name('submit-ticket');
    Route::get('/', [TicketController::class, 'all'])->name('tickets');
});


// Auth Routes
Route::group([], function () {

    Route::get('/register', function () {
        Session(['register_route'=>'routine']);
        return view('auth.register');
    })->name('signup');

    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login')->middleware('guest');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('home');
    })->name('logout');

    Route::post('/sign-in', [AuthController::class, 'login'])->name('sign-in');
});




