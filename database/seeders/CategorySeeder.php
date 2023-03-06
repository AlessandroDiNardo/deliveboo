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
            'indiano',
            'messicano',
            'kebab',
            'hamburger',
            'pizza',
            'pasta',
            'vegetariano',
            'dolci',
            'pesce',
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
