<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// imported Controllers
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD RISTORANTE
Route::middleware('auth')->group(function () {
    Route::get('/restaurant/create', [RestaurantController::class, 'create'])->name('restaurant.create');
    Route::post('/restaurant/store', [RestaurantController::class, 'store'])->name('restaurant.store');
    Route::get('/restaurant/edit/{restaurant}', [RestaurantController::class, 'edit'])->name('restaurant.edit');
    Route::post('/restaurant/update/{restaurant}', [RestaurantController::class, 'update'])->name('restaurant.update');
    Route::get('/restaurant/delete/{restaurant}', [RestaurantController::class, 'delete'])->name('restaurant.delete');
});

// CRUD PRODOTTI
Route::middleware('auth')->group(function () {
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
});

require __DIR__.'/auth.php';
