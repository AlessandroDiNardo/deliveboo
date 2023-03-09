<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//imported Models
use App\Models\Restaurant;
use App\Models\Product;
use App\Models\User;

// imported Facades
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function showAll(Request $request) {

        $restaurant = Restaurant::where('user_id', $request -> user() -> id) -> first();

        return view('pages.product.showAll', compact('restaurant'));
    }

    public function create(Request $request) {
        $product = Product::all();

        return view('pages.product.create', compact('product'));
    }

    public function store(Request $request) {
            
        $data = $request -> all();

        // validate([


        // ]);

        // adding img
        $img_path = Storage::put('productsImg', $data['img']);
        $data['img'] = $img_path;


        $restaurant = Restaurant::where('user_id', $request -> user() -> id) -> first();

        $product = Product::make($data);

        $product -> restaurant() -> associate($restaurant);
        $product -> save();

        return redirect() -> route('profile.edit');
        
    }
}