<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
// return view('welcome');
//     echo "ok";
// })->where('any', '.*');

Route::get('/{any}', function () {
    //return view('admin/dashboard');
    return view('home');
})->where('any', '.*');
