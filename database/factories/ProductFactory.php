<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'description' => fake()->sentence(),
            'quantity' => rand(1, 100),
            'price' => rand(10000, 100000),
            'image' => fake()->image(public_path('storage/product/images'),640,480, null, false),
            'store_id' => rand(1, 10),
        ];
    }
}
