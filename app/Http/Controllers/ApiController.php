<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// imported models
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Product;

class ApiController extends Controller
{
    public function getRestaurants(Request $request) {
        $categories = $request -> categories;

        $restaurants = Restaurant::all();

        if ($categories) {
            $restaurants = null;

            foreach ($categories as $category) {
                $restaurants = Restaurant::whereHas('categories', function ($q) use ($category) {
                    $q->where('category_id', $category);
                })->get();
            }
        }


        return response() -> json([
            'success' => true,
            'response' => $restaurants,
        ]);
    }

    public function getCategories() {
        $categories = Category :: all();

        return response() -> json([
            'success' => true,
            'response' => $categories,
        ]);
    }
}
