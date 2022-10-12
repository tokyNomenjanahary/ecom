<?php

use App\Http\Controllers\Api\cartController;
use App\Http\Controllers\Api\CustomerController;
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
    Route::get('/product/count', [cartController::class, 'count'])->name('products.count');
    Route::get('/product/increase/{id}', [cartController::class, 'increase'])->name('increase');
    Route::get('/product/decrease/{id}', [cartController::class, 'decrease'])->name('decrease');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});