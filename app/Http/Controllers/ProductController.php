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
    public function create(Request $request) {
        $product = Product::all();

        return view('pages.product.create', compact('product'));
}

public function store(Request $request) {
        
    $data = $request -> all();

    // validate([


    // ]);

    // adding img
    $img_path = Storage::put('uploads', $data['img']);
    $data['img'] = $img_path;


    $user = User::find($request -> user() -> id);

    $product = Product::make($data);

    $product -> restaurant() -> associate($user);
    $product -> save();

    return redirect() -> route('profile.edit');
    
}
}