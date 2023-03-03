<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake() -> words(rand(1, 4), true),
            'description' => fake() -> paragraph(2),
            'ingredients' => fake() -> words(rand(3, 8)),
            'price' => fake() -> randomFloat(2, 2, 99),
            'img' => fake() -> imageUrl(360, 360, 'animals', true)
        ];
    }
}
