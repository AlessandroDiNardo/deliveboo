<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// imported controllers
use App\Http\Controllers\ApiController;

Route::get('/v1/restaurants/search', [ApiController::class, 'getRestaurants']);

Route::get('/v1/categories/all', [ApiController::class, 'getCategories']);

Route::get('/v1/products/all', [ApiController::class, 'getProducts']);


