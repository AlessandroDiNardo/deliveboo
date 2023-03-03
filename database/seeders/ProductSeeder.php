<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// imported Models
use App\Models\Product;
use App\Models\Restaurant;

class ProductSeeder extends Seeder
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
            Product::factory()-> count(5) -> make() -> each(function($p) use($restaurant) {
                $p -> restaurant() -> associate($restaurant);
    
                $p -> save();
            });
        }
        
    }
    
}
