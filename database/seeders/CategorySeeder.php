<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// imported Models
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $categories = [
            'italiano', 
            'cinese', 
            'americano',
            'giappponese',
            'bakery',
            'indiano',
            'kebab',
            'hamburger',
            'pizza',
            'fast food',
            'poke',
            'sushi',
            'bibite',
            'pollo',
            'messicano',
            'pasta',
            'piadina',
            'sandwich',
            'vegano',
            'vegetariano',
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
