<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/layout', function () {
    return view('template');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/shopping-cart', ShoppingCartController::class)->name('cart.index');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::view('{any}', 'home')
    ->middleware('auth')
    ->where('any', '.*');
