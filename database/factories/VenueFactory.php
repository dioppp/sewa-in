<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venue>
 */
class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => fake()->name(),
            'address' => fake()->address(),
            'description' => fake()->paragraph(),
            'photo' => 'venues/' . fake()->image('public/storage/venues', 640, 480, null, false),
            'created_by' => 'Seeder',
            'updated_by' => 'Seeder',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
