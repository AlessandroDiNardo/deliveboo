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
    public function create(Request $request) {
        $categories = Category::all();

        return view('pages.restaurant.create', compact('categories'));
    }

    public function store(Request $request) {

        
        $data = $request -> all();
    
        // validate([
        //     'name' => 'required|string|min:3',
        //     'description' => 'required|string|min:3',
        //     'place' => 'required|string|min:3',
        //     'phone_number' => 'required|string|min:3',
        //     'img'  => 'required|string|min:3',
        //     'vat'  => 'required|string|min:3',
        //     'opening_time'  => 'required|string|min:0',
        //     'closing_time' => 'required|string|min:0',
        //     'shipping_cost' => 'required|integer|min:0',
        //     'closing_day' => 'required|string|min:3',
        //     'category_id' => 'required|array'
        // ]);
        
        // adding img
        $img_path = Storage::put('uploads', $data['img']);
        $data['img'] = $img_path;

        $user = User::find($request -> user() -> id);
        
        $restaurant = Restaurant::make($data);

        $restaurant -> user() -> associate($user);

        $restaurant -> save();

        $categories = Category :: find($data['category_id']);

        $restaurant -> categories() -> sync($categories);

        return redirect() -> route('profile.edit');
    }
}
