<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->name('admin.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

