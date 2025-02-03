<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserFamily>
 */
class UserFamilyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'father_name' => fake()->name(),
            'mother_name' => fake()->name(),
            'family_status' => fake()->randomElement(['ayah', 'ibu', 'anak']),
            'number_of_children' => fake()->numberBetween(0, 5),
            'residential_ownership' => fake()->randomElement(['milik', 'sewa']),
        ];
    }
}
