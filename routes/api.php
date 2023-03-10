<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// imported controllers
use App\Http\Controllers\ApiController;

Route::get('/v1/restaurants/all', [ApiController::class, 'getRestaurants']);

