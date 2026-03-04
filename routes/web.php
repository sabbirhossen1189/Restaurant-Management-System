<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

/*
 |--------------------------------------------------------------------------
 | Web Routes
 |--------------------------------------------------------------------------
 */

// Public homepage
Route::get('/', [HomeController::class , 'Home'])->name('home');

// -----------------------------------------------------------------------
// User routes (logged-in users only — no admin required)
// -----------------------------------------------------------------------
Route::middleware(['auth'])->group(function () {

    // Cart
    Route::post('/add_cart/{id}', [HomeController::class , 'add_cart'])->name('add_cart');
    Route::get('/my_cart', [HomeController::class , 'my_cart'])->name('my_cart');
    Route::get('/remove_cart/{id}', [HomeController::class , 'remove_cart'])->name('remove_cart');
    Route::post('/confirm_order', [HomeController::class , 'confirm_order'])->name('confirm_order');

    // Orders
    Route::get('/my_orders', [HomeController::class , 'my_orders'])->name('my_orders');

    // Table booking (any logged-in user can book)
    Route::post('/book_table', [HomeController::class , 'book_table'])->name('book_table');

    // Profile (custom — renamed to avoid Jetstream conflict)
    Route::get('/my-profile', [ProfileController::class , 'show'])->name('user.profile');
    Route::get('/my-profile/edit', [ProfileController::class , 'edit'])->name('user.profile.edit');
    Route::post('/my-profile/update', [ProfileController::class , 'update'])->name('user.profile.update');
});

// -----------------------------------------------------------------------
// Admin routes (logged-in + admin usertype)
// -----------------------------------------------------------------------
Route::middleware(['auth', 'admin'])->group(function () {

    // Food management
    Route::get('/add_food', [AdminController::class , 'add_food'])->name('add_food');
    Route::get('/view_food', [AdminController::class , 'view_food'])->name('view_food');
    Route::post('/upload_food', [AdminController::class , 'upload_food'])->name('upload_food');
    Route::get('/update_food/{id}', [AdminController::class , 'update_food'])->name('update_food');
    Route::get('/delete_food/{id}', [AdminController::class , 'delete_food'])->name('delete_food');
    Route::post('/edit_food/{id}', [AdminController::class , 'edit_food'])->name('edit_food');

    // Order management
    Route::get('/orders', [AdminController::class , 'orders'])->name('orders');
    Route::get('/on_the_way/{id}', [AdminController::class , 'on_the_way'])->name('on_the_way');
    Route::get('/delivered/{id}', [AdminController::class , 'delivered'])->name('delivered');
    Route::get('/canceled/{id}', [AdminController::class , 'canceled'])->name('canceled');

    // Reservations
    Route::get('/reservations', [AdminController::class , 'reservations'])->name('reservations');

    // User management
    Route::get('/users', [AdminController::class , 'users'])->name('users');
    Route::get('/delete_user/{id}', [AdminController::class , 'delete_user'])->name('delete_user');
});

// -----------------------------------------------------------------------
// Admin dashboard (Jetstream sanctum session middleware)
// -----------------------------------------------------------------------
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class , 'index'])->name('admin.dashboard');
});