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
            'order_date' => fake() -> dateTimeInInterval('-1 years', '+1 years'),
            'rider_phone_number' => fake() -> phoneNumber(),
            'buyer_first_name' => fake() -> firstName(),
            'buyer_last_name' => fake() -> lastName(),
            'buyer_email' => fake() -> email(),
            'buyer_phone_number' => fake() -> phoneNumber(),
            'address' => fake() -> streetAddress()
        ];
    }
}
