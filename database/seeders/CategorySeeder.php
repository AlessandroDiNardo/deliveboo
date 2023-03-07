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
            'italiano', /*1*/
            'cinese', /*2*/
            'americano',/*3*/
            'giappponese',/*4*/
            'indiano',/*5*/
            'messicano',/*6*/
            'kebab',/*7*/
            'hamburger',/*8*/
            'pizza',/*9*/
            'pasta',/*10*/
            'vegetariano',/*11*/
            'dolci',/*12*/
            'pesce',/*13*/
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
