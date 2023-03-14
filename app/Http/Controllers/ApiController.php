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
        // checking categories in GET
        $categories = $request -> categories;

        // saving all instances of Restaurant if no filter received as categories
        $restaurants = Restaurant::all();

        // if there are...
        if ($categories) {
            $restaurants = null;

            foreach ($categories as $category) {
                // if restaurants is empty
                if (is_null($restaurants)) {

                    $restaurants = Restaurant::whereHas('categories', function ($q) use ($category) {
                        
                        $q->where('category_id', $category);

                    })->get();
                }
                // if not...
                $restaurants = $restaurants ->merge(Restaurant::whereHas('categories', function ($q) use ($category) {
                    
                    $q->where('category_id', $category);
                    
                })->get());
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
