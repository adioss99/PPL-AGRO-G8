<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardAccountController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\CartController;

// Admin
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardAdminAccountController;
// use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});

// User
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [loginController::class, 'login'])->middleware('guest');
Route::get('/logout', [loginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'create']);

// test

Route::group(['prefix'=>'user','middleware'=>['IsUser','auth','PreventBackHistory']],function(){
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/account', [DashboardAccountController::class, 'index'])->name('dashboard-accounts');
    Route::get('/account/edit', [DashboardAccountController::class, 'edit'])->name('dashboard-accounts-edit');
    Route::post('/account/update', [DashboardAccountController::class, 'update'])->name('dashboard-accounts-update');
    Route::get('/products', [DashboardProductController::class, 'index'])->name('dashboard-products');
    Route::get('/products/view/{id}', [DetailProductController::class, 'index'])->name('dashboard-products-details-view');

    Route::post('/products/view/{id}', [DetailProductController::class, 'add'])->name('cart-add');
    
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart-delete');
    
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');
});

//Admin
Route::group(['prefix'=>'admin','middleware'=>['IsAdmin','auth','PreventBackHistory']],function(){
    Route::get('/', [DashboardAdminController::class, 'index'])->name('admin-dashboard');
    Route::get('/account', [DashboardAdminAccountController::class, 'index'])->name('admin-dashboard-accounts');
    Route::get('/account/edit', [DashboardAdminAccountController::class, 'edit'])->name('admin-dashboard-accounts-edit');
    Route::post('/account/update', [DashboardAdminAccountController::class, 'update'])->name('admin-dashboard-accounts-update');
    
    Route::resource('/user',UserController::class);
    Route::resource('/product',ProductController::class);
    Route::resource('/product-gallery',ProductGalleryController::class);
    
    Route::get('/product/create', [DashboardProductController::class, 'create'])->name('dashboard-products-create');
    Route::post('/product/store', [DashboardProductController::class, 'store'])->name('dashboard-products-store');
    
    Route::get('/product/view/{id}', [DetailProductController::class, 'admin'])->name('admin-products-details-view');
    
    Route::get('/product/edit/{id}', [DashboardProductController::class, 'edit'])->name('dashboard-products-edit');
    Route::post('/product/edit/{id}', [DashboardProductController::class, 'update'])->name('dashboard-products-update');
    Route::get('/product/gallery/delete/{id}', [DashboardProductController::class, 'deleteGallery'])->name('dashboard-products-gallery-delete');
    Route::post('/product/gallery/upload', [DashboardProductController::class, 'uploadGallery'])->name('dashboard-products-gallery-upload');
    
});


Auth::routes();


