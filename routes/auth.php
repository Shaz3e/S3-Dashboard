<?php

use Illuminate\Support\Facades\Route;

// Auth
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\VerifyEmailController;

Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    // Login
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    // Forgot
    Route::get('/forgot', [ForgotPasswordController::class, 'forgot'])->name('forgot');
    Route::post('/forgot', [ForgotPasswordController::class, 'store'])->name('forgot.store');

    // Reset Password
    Route::get('/reset/{email}/{token}', [PasswordResetController::class, 'reset'])->name('reset');
    Route::post('/reset', [PasswordResetController::class, 'store'])->name('reset.store');

    Route::get('/verify', [VerifyEmailController::class, 'verify'])->name('verify');
    Route::post('/verify', [VerifyEmailController::class, 'store'])->name('verify.store');
});
