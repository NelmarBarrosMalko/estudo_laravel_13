<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends Factory<Model>
 */
class UserAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'type' => fake()->randomElement(['home', 'work']),
            'zip_code' => fake()->postcode(),
            'street' => fake()->streetName(),
            'number' => (string) fake()->buildingNumber(),
            'complement' => fake()->optional(0.3)->secondaryAddress(),
            'neighborhood' => fake()->citySuffix() . ' ' . fake()->lastName(),
            'city' => fake()->city(),
            'state' => fake()->stateAbbr(),
        ];
    }
}
