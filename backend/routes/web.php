<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signin', function () {
    return view('pages.signin');
});

Route::get('/signup', function () {
    return view('pages.signup');
});
