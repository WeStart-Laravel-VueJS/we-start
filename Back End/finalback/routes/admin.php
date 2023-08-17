<?php

use App\Http\Controllers\Admin\AdvertisementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;

Route::middleware('auth:admin')->name('admin.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/account', [DashboardController::class, 'account'])->name('account');
    Route::put('/account', [DashboardController::class, 'account_update'])->name('account_update');

    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::post('/settings', [DashboardController::class, 'settings_update'])->name('settings_update');

    Route::resource('categories', CategoryController::class);
    Route::resource('advertisements', AdvertisementController::class);
    Route::resource('roles', RoleController::class);

    Route::get('/services', [DashboardController::class, 'services'])->name('services');
    Route::get('/reports', [DashboardController::class, 'reports'])->name('reports');
    Route::post('/reports/{id}', [DashboardController::class, 'reports_replay'])->name('reports_replay');
    Route::get('/payments', [DashboardController::class, 'payments'])->name('payments');

});

