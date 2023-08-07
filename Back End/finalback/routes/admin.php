<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

Route::middleware('auth:admin')->name('admin.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/account', [DashboardController::class, 'account'])->name('account');
    Route::put('/account', [DashboardController::class, 'account_update'])->name('account_update');

    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::post('/settings', [DashboardController::class, 'settings_update'])->name('settings_update');

    Route::resource('categories', CategoryController::class);
});

