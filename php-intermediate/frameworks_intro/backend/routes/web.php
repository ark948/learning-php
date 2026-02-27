<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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