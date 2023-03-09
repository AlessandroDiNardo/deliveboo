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
            
        $data = $request -> validate([
            'name' => 'required|string|min:3',
            'ingredients' => 'required|string|min:3',
            'visible' => 'required|numeric|between:0,1',
            'img'  => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'price' => 'required|numeric|between:1,300',

        ]);

        // adding img
        $img_path = Storage::put('productsImg', $data['img']);
        $data['img'] = $img_path;


        $restaurant = Restaurant::where('user_id', $request -> user() -> id) -> first();

        $product = Product::make($data);

        $product -> restaurant() -> associate($restaurant);
        $product -> save();

        return redirect() -> route('product.showAll');
        
    }

    public function edit(Product $product) {

        return view('pages.product.update', compact('product'));
    }

    public function update(Request $request, Product $product) {

        $data = $request -> validate([
            'name' => 'required|string|min:3',
            'ingredients' => 'required|string|min:3',
            'visible' => 'required|numeric|between:0,1',
            'img'  => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'price' => 'required|numeric|between:1,300',
        ]);
        
        // update img only if uploaded new img
        if (array_key_exists('img', $data)) {

            Storage::delete($product -> img);

            $img_path = Storage::put('productsImg', $data['img']);

            $data['img'] = $img_path;
        }

        $restaurant = Restaurant::where('user_id', $request -> user() -> id) -> first();

        $product -> update($data);
        
        $product -> restaurant() -> associate($restaurant);

        $product -> save();

        return redirect() -> route('product.showAll');
    }

    public function delete(Product $product) {
        Storage::delete($product -> img);

        $product -> delete();

        return redirect() -> route('product.showAll');
    }
}