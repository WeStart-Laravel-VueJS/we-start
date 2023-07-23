<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


// Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
// Route::get('courses/{id}', [CourseController::class, 'show'])->name('courses.show');

// Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
// Route::post('courses', [CourseController::class, 'store'])->name('courses.store');

// Route::get('courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
// Route::match(['put', 'patch'], 'courses/{id}', [CourseController::class, 'update'])->name('courses.update');

// Route::delete('courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

// Route::group(['prefix' => LaravelLocalization::setLocale()], function() {

Route::prefix(LaravelLocalization::setLocale())->group(function() {

    Route::get('courses/trash', [CourseController::class, 'trash'])->name('courses.trash');
    Route::get('courses/{course}/restore', [CourseController::class, 'restore'])->name('courses.restore')->withTrashed();
    Route::get('courses/{course}/forcedelete', [CourseController::class, 'forcedelete'])->name('courses.forcedelete')->withTrashed();
    Route::resource('courses', CourseController::class);


    Route::get('contact-us', [ContactController::class, 'contact_us'])->name('contact_us');
    Route::post('contact-us', [ContactController::class, 'contact_us_data']);
});
