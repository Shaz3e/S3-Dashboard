<?php

use Illuminate\Support\Facades\Route;

// Langugage
Route::get('/language/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang');

require_once __DIR__ . '/website.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/admin.php';
require_once __DIR__ . '/user.php';

// All redirect Routes URLs
require __DIR__ . '/redirect.php';
