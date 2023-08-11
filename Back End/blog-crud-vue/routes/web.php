<?php

use Illuminate\Support\Facades\Route;

Route::get('/{sama?}', function () {
    return view('welcome');
})->where('sama', '.*');
