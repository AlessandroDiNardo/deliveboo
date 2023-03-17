<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// imported controllers
use App\Http\Controllers\ApiController;
use App\Http\Controllers\PaymentController;

Route::get('/v1/restaurants/search', [ApiController::class, 'getRestaurants']);

Route::get('/v1/categories/all', [ApiController::class, 'getCategories']);

Route::get('/v1/products/all', [ApiController::class, 'getProducts']);

Route::get('v1/braintree/client-token', [PaymentController::class, 'checkout']);

Route::post('v1/braintree/transaction', [PaymentController::class, 'transaction']);