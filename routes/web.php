<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home']);

Route::get('dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('product_details/{id}', [HomeController::class, 'product_details']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
//Admin views

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin']);
Route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);
Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);

Route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'admin'])->name('admin.product');
Route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth', 'admin']);
Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);
Route::get('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin']);
Route::put('update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin']);
Route::get('product_search', [AdminController::class, 'product_search'])->middleware(['auth', 'admin']);
Route::get('order_list_view', [AdminController::class, 'order_list_view'])->middleware(['auth', 'admin']);
Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->middleware(['auth', 'admin']);
Route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware(['auth', 'admin']);
Route::get('userList', [AdminController::class, 'userView'])->middleware(['auth', 'admin'])->name('admin.userList');
Route::get('deleteUser/{id}', [AdminController::class, 'userDelete'])->middleware(['auth', 'admin']);
Route::get('manageUser/{id}', [AdminController::class, 'manageUser'])->middleware(['auth', 'admin']);
Route::put('updateUser/{id}', [AdminController::class, 'updateUser'])->middleware(['auth', 'admin']);



// Customer views
//login view
Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);
Route::get('view_cart', [HomeController::class, 'view_cart'])->middleware(['auth', 'verified']); //here we don't need to pass user id because, it's the user id that needed to be passed
Route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->middleware(['auth', 'verified']);
Route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified']);
Route::get('order_history', [HomeController::class, 'order_history'])->middleware(['auth', 'verified']);
Route::get('wishlist', [HomeController::class, 'wishlist'])->middleware(['auth', 'verified']);
Route::get('add_wishlist/{id}', [HomeController::class, 'add_wishlist'])->middleware(['auth', 'verified']);
Route::get('delete_wishlist/{id}', [HomeController::class, 'delete_wishlist'])->middleware(['auth', 'verified']);

//public view
Route::get('shop', [HomeController::class, 'shop']);
Route::get('why', [HomeController::class, 'why']);
Route::get('testimonial', [HomeController::class, 'testimonial']);

//stripe payment
Route::controller(HomeController::class)->group(function () {

    Route::get('stripe/{totalValue}', 'stripe');

    Route::post('stripe/{totalValue}', 'stripePost')->name('stripe.post');
});
