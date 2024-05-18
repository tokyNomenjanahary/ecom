<?php

use App\Http\Controllers\Api\cartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('products', cartController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::post('/product/categories', [CategoryController::class, 'getCategoryWithpropertyValue']);
    Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');
    Route::post('/properties/store', [PropertyController::class, 'store'])->name('properties.store');
    Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
    Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
    Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::get('/admin/products', [ProductController::class, 'index'])->name('products');
    Route::get('/admin/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/product/count', [cartController::class, 'count'])->name('products.count');
    Route::get('/product/increase/{id}', [cartController::class, 'increase'])->name('increase');
    Route::get('/product/decrease/{id}', [cartController::class, 'decrease'])->name('decrease');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
