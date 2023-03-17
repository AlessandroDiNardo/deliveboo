<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Product;

class OrderController extends Controller
{
    public function show(Request $request) {

        $restaurant = Restaurant::where('user_id', $request -> user() -> id) -> first();

        $product = Product::all();

        return view('pages.order.show', compact('restaurant', 'product'));
    }
}

