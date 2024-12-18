<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'is_approved' => fake()->boolean(),
            'address' => fake()->address(),
            'logo' => fake()->image(public_path('storage/store/images'),250,250, null, false),
            'user_id' => User::factory(),
        ];
    }
}
