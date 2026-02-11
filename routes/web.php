<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/icons-demo', function () {
    return view('icons-demo'); // your Blade Icons demo page
});
