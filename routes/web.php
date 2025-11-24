<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Category;

// Admin Login
Route::get('/admin/login', [AdminAuthController::class, 'loginPage'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// Admin Protected Area
Route::prefix('admin')->middleware(['adminAuth'])->group(function () {
    Route::get('/dashboard', function () {
    $categories = Category::all();
    $category = null;
    return view('admin.admin-panel', compact('categories', 'category'));
    });

    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

     Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
    ->name('admin.categories.destroy');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
    ->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])
    ->name('admin.categories.update');

     Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
      Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');

});

Route::get('/', function () {
    return view('shop.shop'); 
});

