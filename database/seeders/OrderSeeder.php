<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// imported Models
use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = Restaurant::orderBy('id') -> get();

        foreach ($restaurants as $restaurant) {
            Order::factory()-> count(2) -> make() -> each(function($o) use($restaurant) {
                $o -> restaurant() -> associate($restaurant);
    
                $o -> save();

                $products = Product::where('restaurant_id', '=', $restaurant -> id) -> inRandomOrder() -> limit(rand(1,5)) -> get();

                $o -> products() -> sync($products);
            });
        }
    }
}
