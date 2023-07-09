<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::post('/contact', [FrontController::class, 'contact_data']);

Route::get('/projects', [FrontController::class, 'projects'])->name('front.projects');

Route::get('/resume', [FrontController::class, 'resume'])->name('front.resume');
