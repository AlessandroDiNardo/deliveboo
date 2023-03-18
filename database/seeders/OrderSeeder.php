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
            Order::factory()-> count(5) -> make() -> each(function($o) use($restaurant) {
                $o -> restaurant() -> associate($restaurant);
                
                $products = Product::where('restaurant_id', '=', $restaurant -> id) -> inRandomOrder() -> limit(rand(1,5)) -> get();
                
                $sum = $restaurant -> shipping_cost;

                foreach ($products as $product) {
                    $sum += $product -> price;
                }

                $o -> price = $sum;

                $o -> save();

                $o -> products() -> sync($products);
            });
        }
    }
}
