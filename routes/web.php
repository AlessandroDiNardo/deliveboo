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
Route::middleware(['auth', 'can:view,restaurant'])->group(function () {
    Route::get('/restaurant/edit/{restaurant}', [RestaurantController::class, 'edit'])->name('restaurant.edit');
    Route::post('/restaurant/update/{restaurant}', [RestaurantController::class, 'update'])->name('restaurant.update');
    Route::get('/restaurant/delete/{restaurant}', [RestaurantController::class, 'delete'])->name('restaurant.delete');
});

// CRUD PRODOTTI
Route::middleware(['auth', 'can:view,product'])->group(function () {
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
});

// SHOW ALL PRODUCT AND RESTAURANT
Route::middleware('auth')->group(function (){
    Route::get('/restaurant/create', [RestaurantController::class, 'create'])->name('restaurant.create');
    Route::post('/restaurant/store', [RestaurantController::class, 'store'])->name('restaurant.store');
 
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/showall', [ProductController::class, 'showAll'])->name('product.showAll');
});
require __DIR__.'/auth.php';
