<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::post(uri: '/submit', action: function(): string {
        return "form sbumitted";
});

Route::get(uri: '/user/{id}', action: function($id): string {
    return "User ID: " . $id;
});

// Optional parameter
Route::get('/user/{name?}', function($name = 'Guest') {
    return "Hello, " . $name;
});

Route::get('/', [PostsController::class, 'home']);
Route::get('/all', [PostsController::class, "allPosts"]);
Route::get('/post/{id}', [PostsController::class, "singlePost"]);