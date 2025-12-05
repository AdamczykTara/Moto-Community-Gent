<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RideFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(2),
            'photo' => fake()->imageUrl(600, 400, 'motorcycle', true),
        ];
    }
}
