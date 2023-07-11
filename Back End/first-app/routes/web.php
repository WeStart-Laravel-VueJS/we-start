<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\FormController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// use , namespace
// Route::post('/', function() {
//     return 'Homepage';
// });

// Route::get('/', function() {

//     $url = route('single-course', ['php']);
//     return "<a href='$url'>PHP</a>";

// });

// Route::delete('/', function() {
//     return 'Homepage';
// });

// Route::get('uri', 'action');
// Route::post('uri', 'action');
// Route::put('uri', 'action');
// Route::patch('uri', 'action');
// Route::delete('uri', 'action');

// include 'admin.php';

// Route::match(['put', 'patch'], '/edit', function () {
//     return 'Edit Page';
// });

// Route::any('/test', function() {
//     return 'Test';
// });

// Route::redirect('/about', '/contact');

// return redirect();

// Route::view('/welcome', 'welcome');

// Route::get('user/{name}/{age}/{user}', function($name, $age, $user) {
//     return "Welcome $name, your age is $age, username = $user";
// })
// ->whereAlpha('name')
// ->whereNumber('age')
// ->whereAlphaNumeric('user');
// ->where('name', '[0-9]+');
// ->where('name', '[0-9]+');

// Route::get('/post/{id}', function($id) {
//     return 'Post #'.$id;
// });
// ->missing(function () {
//     return redirect('/');
// });

// Route::fallback(function() {
//     return redirect('/');
// });

// Route::get('/sessions/{course}/{type?}', function($course, $type = 'online') {
//     return "Course Name : $course and Course Type : $type";
// })->name('single-course');

// Route::prefix('admin')->name('admin.')->group(function() {
//     Route::get('/', function() { return 'Admin Dashboard'; })->name('index');
//     Route::get('/posts', function() { return 'Admin posts'; })->name('posts');
//     Route::get('/orders', function() { return 'Admin orders'; })->name('orders');
//     Route::get('/books', function() { return 'Admin books'; })->name('books');
//     Route::get('/categories', function() { return 'Admin categories'; })->name('categories');
// });


// Route::get('books/{book}', function(Book $book) {
//     dd($book);
// })->withTrashed();

// Route::get('/', [MainController::class, 'index']);

// Route::get('/export', ExportController::class);

// posts

// courses

// categories


Route::get('home', [FirstController::class, 'home'])->name('first.home');
Route::get('about', [FirstController::class, 'about'])->name('first.about');
Route::get('contact', [FirstController::class, 'contact'])->name('first.contact');
Route::post('contact', [FirstController::class, 'contactData']);


Route::get('form1', [FormController::class, 'form1'])->name('forms.form1');
Route::post('form1', [FormController::class, 'form1_data']);
