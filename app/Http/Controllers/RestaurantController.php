<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// imported Models
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\User;

// imported Facades
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Restaurant::class);
    }
    
    public function create(Request $request) {
        $categories = Category::all();

        return view('pages.restaurant.create', compact('categories'));
    }

    public function store(Request $request) {

        
        $data = $request -> validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:10',
            'place' => 'required|string|min:5',
            'phone_number' => 'required|string|min:5',
            'img'  => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'vat'  => 'required|string|min:11|max:11|',
            'opening_time'  => 'date_format:"H:i"|required',
            'closing_time' => 'date_format:"H:i"|required',
            'shipping_cost' => 'required|numeric|between:0,9.99',
            'closing_day' => 'required|string|min:3',
            'category_id' => 'required|array'
        ]);
        
        // adding img
        $img_path = Storage::put('restaurantsImg', $data['img']);
        $data['img'] = $img_path;

        $user = User::find($request -> user() -> id);
        
        $restaurant = Restaurant::make($data);

        $restaurant -> user() -> associate($user);

        $restaurant -> save();

        $categories = Category :: find($data['category_id']);

        $restaurant -> categories() -> sync($categories);

        return redirect() -> route('profile.edit');
    }

    public function edit(Restaurant $restaurant) {
        $categories = Category::all();

        return view('pages.restaurant.update', compact('restaurant', 'categories')
        );
    }

    public function update(Request $request, Restaurant $restaurant) {

        $data = $request -> validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:10',
            'place' => 'required|string|min:5',
            'phone_number' => 'required|string|min:5',
            'img'  => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'vat'  => 'required|string|min:11|max:11|',
            // 'opening_time'  => 'date_format:"H:i"|required',
            // 'closing_time' => 'date_format:"H:i"|required',
            'shipping_cost' => 'required|numeric|between:0,9.99',
            'closing_day' => 'required|string|min:3',
            'category_id' => 'required|array'
        ]);
        
        // update img only if uploaded new img
        if (array_key_exists('img', $data)) {

            Storage::delete($restaurant -> img);

            $img_path = Storage::put('restaurantsImg', $data['img']);

            $data['img'] = $img_path;
        }

        $user = User::find($request -> user() -> id);

        $restaurant -> update($data);
        
        $restaurant -> user() -> associate($user);

        $restaurant -> save();

        $categories = Category :: find($data['category_id']);

        $restaurant -> categories() -> sync($categories);

        return redirect() -> route('profile.edit');
    }

    public function delete(Restaurant $restaurant) {
        Storage::delete($restaurant -> img);

        $restaurant -> categories() -> sync([]);

        $restaurant -> delete();

        return redirect() -> route('profile.edit');
    }
}
