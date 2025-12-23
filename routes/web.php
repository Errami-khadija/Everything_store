<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\CustomerController;
use App\Models\Category;
use App\Models\Product;

use App\Http\Controllers\StoreFront\HomeController;
use App\Http\Controllers\StoreFront\CartController;
// Admin Login
Route::get('/admin/login', [AdminAuthController::class, 'loginPage'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// Admin Protected Area
Route::prefix('admin')->middleware(['adminAuth'])->group(function () {
    // Route::get('/dashboard', function () {
    // $categories = Category::all();
    // $products = Product::with('category')->latest()->get();
    // $category = null;
    // return view('admin.admin-panel');
    // });

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
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');


    Route::get('/orders', [OrdersController::class, 'index'])->name('admin.orders.index');
     Route::get('/orders/export', [OrdersController::class, 'export'])
    ->name('admin.orders.export');
    Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders/{id}/status', [OrdersController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::put('/orders/{order}/status', [OrdersController::class, 'updateStatus']);
    Route::put('/orders/{order}/cancel', [OrdersController::class, 'cancel']);
    Route::get('/orders/{order}/print', [OrdersController::class, 'print']);
    Route::get('/orders/{order}/invoice', [OrdersController::class, 'invoice'])
    ->name('admin.orders.invoice');

    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('admin.customers.show');
    Route::put('/customers/{id}/toggle-block', [CustomerController::class, 'toggleBlock'])->name('admin.customers.toggle-block');
    Route::get('/customers/{id}/orders', [CustomerController::class, 'orders'])->name('admin.customers.orders');



   






});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/json', [CartController::class, 'getCartJson'])->name('cart.json');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update']);
Route::post('/cart/remove', [CartController::class, 'remove']);
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/thank-you', [CartController::class, 'thankYou'])->name('cart.thankyou');



