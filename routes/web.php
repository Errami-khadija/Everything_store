<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

// Admin Login
Route::get('/admin/login', [AdminAuthController::class, 'loginPage'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// Admin Protected Area
Route::middleware(['adminAuth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); 
    });

    Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

