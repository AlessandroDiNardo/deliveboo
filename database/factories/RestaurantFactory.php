<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake() -> words(rand(2, 3), true),
            'description' => fake() -> paragraph(2),
            'place' => fake() -> streetAddress(),
            'phone_number' => fake() -> phoneNumber(),
            'img' => fake() -> imageUrl(360, 360, 'animals', true),
            'vat' => fake() -> vat(),
            'opening_time' => fake() -> time(),
            'closing_time' => fake() -> time(),
            'shipping_cost' => fake() -> randomFloat(2, 1, 5),
            'closing_day' => fake() -> dayOfWeek()
        ];
    }
}
