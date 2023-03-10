<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake() -> ean8(),
            'price' => fake() -> randomFloat(2, 40, 999),
            'order_date' => fake() -> dateTime(),
            'rider_phone_number' => fake() -> phoneNumber(),
            'buyer_phone_number' => fake() -> phoneNumber(),
            'address' => fake() -> streetAddress()
        ];
    }
}
