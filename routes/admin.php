<?php

use Illuminate\Support\Facades\Route;
// Dashboard
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\LockController;
use App\Http\Controllers\Auth\LogoutController;

// User

Route::middleware('auth')->group(function () {
    // Lock
    Route::get('lock', [LockController::class, 'view'])
        ->name('lock');
    Route::post('lock', [LockController::class, 'post'])
        ->name('lock.store');
});

Route::middleware(['auth', 'locked', 'active', 'verify'])->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', DashboardController::class)->name('dashboard');

    // Logout
    Route::post('/logout', LogoutController::class)->name('logout');


    // Profile
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

    // Manage
    Route::prefix('/manage')->group(function () {

        // Users

    });
});
