<?php

use App\Http\Controllers\Admin\ClientController;
use Illuminate\Support\Facades\Route;

// Logout
use App\Http\Controllers\Auth\LogoutController;

// Profile
use App\Http\Controllers\Admin\ProfileController;

// Roles and Permissions
use App\Http\Controllers\Admin\RolePermission\RoleController;
use App\Http\Controllers\Admin\RolePermission\PermissionController;

// Dashboard
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Setting\AuthSettingController;
// Settings
use App\Http\Controllers\Admin\Setting\GeneralSettingController;
use App\Http\Controllers\Admin\Setting\SmtpServerSettingController;

// Users
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth', 'locked', 'active', 'verify'])->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Logout
    Route::post('/logout', LogoutController::class)->name('logout');


    // Profile
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

    // Clients
    Route::resource('/clients', ClientController::class);

    // Manage
    Route::prefix('/manage')->group(function () {

        Route::resource('/users', UserController::class);

        // Setting
        Route::prefix('/settings')->group(function () {

            // General Settings
            Route::get('/', [GeneralSettingController::class, 'general'])->name('settings.general');
            Route::post('/', [GeneralSettingController::class, 'store'])->name('settings.general.store');

            // Authentication Settings
            Route::get('/authenication', [AuthSettingController::class, 'authSetting'])->name('settings.auth');
            Route::post('/authenication', [AuthSettingController::class, 'authSettingStore'])->name('settings.auth.store');

            // SMTP Servers
            Route::resource('/smtp-servers', SmtpServerSettingController::class);
        });

        // Roles and Permissions
        Route::prefix('/roles-permissions')->group(function () {

            // Roles
            Route::resource('/roles', RoleController::class);

            // Permissions
            Route::get('/permissions', PermissionController::class)->name('permissions.index');
        });
    });
});
