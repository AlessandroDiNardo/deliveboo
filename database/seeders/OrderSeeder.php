<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $restaurants = Restaurant::orderBy('id')->get();

        foreach ($restaurants as $restaurant) {
            Order::factory()->count(6)->make()->each(function ($o) use ($restaurant) {
                $o->restaurant()->associate($restaurant);

                $o->save();

                $products = Product::where('restaurant_id', '=', $restaurant->id)
                    ->inRandomOrder()
                    ->limit(rand(1, 5))
                    ->get();

                $sum = $restaurant->shipping_cost;

                foreach ($products as $product) {
                    $quantity = rand(1, 3);
                    $sum += $product->price * $quantity;
                    for ($i = 1; $i <= $quantity; $i++) {
                        $o->products()->attach($product->id);
                    }
                }
                

                $o->price = $sum;

                $o->save();
            });
        }
    }
}

