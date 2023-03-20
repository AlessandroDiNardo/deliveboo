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

        $user = Auth::user();
        $restaurant_id = Restaurant::where('user_id', $user->id)->value('id');

        // Recupera gli ordini associati al ristorante e i relativi dettagli dei prodotti
        $orders = Order::where('restaurant_id', $restaurant_id)
                    ->with('products')
                    ->get();

        return view('pages.order.show', compact('orders'));
    }

}
