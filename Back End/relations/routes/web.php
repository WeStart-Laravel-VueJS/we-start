<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RelationController;
use Illuminate\Support\Facades\Route;

Route::get('/countries', [RelationController::class, 'countries']);


Route::get('/posts', [RelationController::class, 'posts']);
Route::get('/posts/{post}', [RelationController::class, 'post'])->name('post');
Route::post('/posts/{post}/comment', [RelationController::class, 'post_comment'])->name('post.comment');

Route::get('/add_post', [RelationController::class, 'add_post']);
Route::post('/add_post', [RelationController::class, 'add_post_data'])->name('add_post');
Route::post('/upload_image', [RelationController::class, 'upload_image'])->name('upload_image');


Route::get('/send-notification', [NotificationController::class, 'send_notification']);
Route::get('/all-notification', [NotificationController::class, 'all_notification']);
Route::get('/read-notification/{id}', [NotificationController::class, 'read_notification'])->name('read_notification');
