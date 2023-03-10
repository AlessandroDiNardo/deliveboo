<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// imported models
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Product;

class ApiController extends Controller
{
    public function getRestaurants() {

        $restaurants = Restaurant :: with('categories', 'products')
                    -> orderBy('created_at', 'desc')
                    -> get();
        $products = Product :: all();
        $categories = Category :: all();

        return response() -> json([
            'success' => true,
            'response' => [
                'restaurants' => $restaurants,
                'products' => $products,
                'categories' => $categories,
            ]
        ]);
    }
}
