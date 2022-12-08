<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ShoppingCartController;

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


Route::get('/layout', function () {
    return view('template');
});

Route::get('/', [ProductController::class, 'index'])->name('home.index');
Route::get('/shopping-cart', ShoppingCartController::class)->name('cart.index');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/create_products', [AdminController::class, 'create'])->name('products.create');
});

Route::view('{any}', 'admin.dashboard')
    ->middleware(['auth', 'isAdmin'])
    ->where('any', '.*');
