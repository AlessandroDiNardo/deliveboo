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
            'Italiano', /*1*/
            'Cinese', /*2*/
            'Americano',/*3*/
            'Giappponese',/*4*/
            'Indiano',/*5*/
            'Messicano',/*6*/
            'Kebab',/*7*/
            'Hamburger',/*8*/
            'Pizza',/*9*/
            'Pasta',/*10*/
            'Vegetariano',/*11*/
            'Dolci',/*12*/
            'Pesce',/*13*/
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
