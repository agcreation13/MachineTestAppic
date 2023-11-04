<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetDataController;

Route::get('/', [GetDataController::class, 'productList']);
Route::get('/products', [GetDataController::class, 'productList']);
// category-wise products
Route::get('/products/category', [GetDataController::class, 'categoryWiseProduct']);
// searching products
Route::get('/products/searching', [GetDataController::class, 'search']);