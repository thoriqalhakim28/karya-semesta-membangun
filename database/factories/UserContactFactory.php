<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserContact>
 */
class UserContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phone_number' => fake()->phoneNumber(),
            'mandiri_account_number' => fake()->numberBetween(1000000000, 9999999999),
            'btn_account_number' => fake()->numberBetween(1000000000, 9999999999),
        ];
    }
}
