<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name, // Generate a fake name
            'phone' => $this->faker->phoneNumber, // Generate a fake phone number
            'address' => $this->faker->address, // Generate a fake address
            'user_id' => \App\Models\User::factory(), // Associate with a user
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
