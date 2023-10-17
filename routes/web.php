<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\support\facades\Mail;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/', PostController::class);
Route::post('/posts/{post}/comments', [CommentsController::class, 'store']);

Route::get('/signup/{lang}', function ($lang) {
    App::setLocale($lang);
    return view('signup');
});
Route::get('mail/', function () {
    Mail::raw('ty', function ($message) {
        $message->to('name@example.com')->subject('contact us');
    });
});
