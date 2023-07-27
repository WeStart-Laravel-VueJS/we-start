<?php

use App\Http\Controllers\RelationController;
use Illuminate\Support\Facades\Route;

Route::get('/countries', [RelationController::class, 'countries']);


Route::get('/posts', [RelationController::class, 'posts']);
Route::get('/posts/{post}', [RelationController::class, 'post'])->name('post');
Route::post('/posts/{post}/comment', [RelationController::class, 'post_comment'])->name('post.comment');

Route::get('/add_post', [RelationController::class, 'add_post']);
Route::post('/add_post', [RelationController::class, 'add_post_data'])->name('add_post');
