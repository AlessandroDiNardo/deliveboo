<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// imported Models
use App\Models\Restaurant;
use App\Models\Category;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::factory()-> count(5) -> make() -> each(function($r) {
            $r -> save();

            $categories = Category::inRandomOrder() -> limit(rand(1,3)) -> get();

            $r -> categories() -> sync($categories);
        });
    }
}
