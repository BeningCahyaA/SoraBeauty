<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('products', [HomepageController::class, 'products'])->name('products');
Route::get('product/{slug}', [HomepageController::class, 'product'])->name('product.show');
Route::get('categories', [HomepageController::class, 'categories']);
Route::get('category/{slug}', [HomepageController::class, 'category']);

Route::middleware('auth:customer')->get('/homepage', [HomepageController::class, 'index']);
// Route::get('cart', [HomepageController::class, 'cart'])->name('cart.index');
Route::get('checkout', [HomepageController::class, 'checkout'])->name('checkout.index');

Route::patch('/products/{id}/toggle-status', [ProductController::class, 'toggleStatus'])->name('products.toggleStatus');

Route::get('get.api.data', [ApiController::class, 'getApiData'])->name('get.api.data');


Route::group(['prefix' => 'customer'], function () {
    //Semua route yang ada di dalam sini,diakses dengan prefix customer
    Route::controller(CustomerAuthController::class)->group(function () {
        Route::group(['middleware' => 'check_customer_login'], function () {

            Route::get('login', 'login')->name('customer.login');
            Route::get('register', 'register')->name('customer.register');
            Route::post('login', 'store_login')->name('customer.store_login');
            Route::post('register', 'store_register')->name('customer.store_register');
        });
        Route::post('logout', 'logout')->name('customer.logout');
    });
});

// Group untuk customer cart

Route::middleware('auth:customer')->prefix('cart')->name('cart.')->group(function () {
    Route::get('/',           [CartController::class, 'index'])->name('index');
    Route::post('/add',       [CartController::class, 'add'])->name('add');
    Route::patch('/update/{productId}', [CartController::class, 'update'])->name('update');
    Route::delete('/remove/{productId}',[CartController::class, 'remove'])->name('remove');
});

Route::middleware('auth:customer')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
});

// Group admin & dahboard
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::resource('categories', ProductCategoryController::class);
    Route::resource('products', ProductController::class);
     Route::post('products/sync/{id}', [ProductController::class, 'sync'])->name('products.sync');
    Route::post('category/sync/{id}', [ProductCategoryController::class, 'sync'])->name('category.sync');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// routes/web.php
Route::middleware(['auth','verified'])
      ->prefix('dashboard')->name('orders.')
      ->group(function () {
          Route::get('orders',          [OrderController::class,'index'])->name('index');
          Route::patch('orders/{order}',[OrderController::class,'update'])->name('update');
      });


require __DIR__ . '/auth.php';
