<?php

use Illuminate\Support\Facades\Route;
// Dashboard
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LogoutController;

// User

Route::middleware('auth')->name('admin.')->group(function () {

    // Logout
    Route::post('/logout', LogoutController::class)->name('logout');

    Route::get('/', DashboardController::class)->name('dashboard');

    Route::get('/profile', function () {
        return '';
    })->name('profile');

    // Manage
    Route::prefix('/manage')->group(function () {

        // Users

    });
});
