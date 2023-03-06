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
        for ($i = 1; $i < 6; $i++) {

            Restaurant::factory()-> count(1) -> make() -> each(function($r) use($i) {
                $r -> user_id = $i;

                $r -> save();

                $categories = Category::inRandomOrder() -> limit(rand(1,3)) -> get();

                $r -> categories() -> sync($categories);
            });
        }
    }
}
