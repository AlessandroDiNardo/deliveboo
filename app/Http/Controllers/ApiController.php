<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// imported models
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Product;

// imported Facades
use Illuminate\Support\Facades\Storage;


class ApiController extends Controller
{
    public function getRestaurants(Request $request) {
        // checking categories in GET
        $categories = $request -> get('categories');

        // saving all instances of Restaurant if no filter received as categories
        $restaurants = Restaurant::with('categories');

        // if there are...
        if ($categories) {

            $restaurants = null;

            foreach ($categories as $category) {
                
                if(is_null($restaurants)) {

                    $restaurants = Restaurant::with('categories') -> whereHas('categories', function ($q) use ($category) {
                        
                        $q->where('category_id', $category);
        
                    });
                }

                $restaurants = $restaurants -> whereHas('categories', function ($q) use ($category) {
                        
                    $q->where('category_id', $category);
    
                });
            }

        }

        $restaurants = $restaurants -> get();

        foreach ($restaurants as $restaurant) {

            if (str_contains($restaurant -> img, 'restaurantsImg')) {

                $restaurant -> img = Storage::url($restaurant -> img);
            }
        }


        return response() -> json([
            'success' => true,
            'response' => [
                'restaurants' => $restaurants,
            ]
        ]);
    }

    public function getCategories() {
        $categories = Category :: all();

        return response() -> json([
            'success' => true,
            'response' => $categories,
        ]);
    }

    public function getProducts(Request $request) {
        $restaurantId = $request -> get('restaurantId');

        $restaurant = Restaurant::with('products', 'categories') -> find($restaurantId);


        if (str_contains($restaurant -> img, 'restaurantsImg')) {

            $restaurant -> img = Storage::url($restaurant -> img);
        }

        foreach ($restaurant -> products as $product) {
            if (str_contains($product -> img, 'productsImg')) {

                $product -> img = Storage::url($product -> img);
            }
        }

        return response() -> json([
            'success' => true,
            'response' => [
                'restaurant' => $restaurant
            ],
        ]);
    }
}
