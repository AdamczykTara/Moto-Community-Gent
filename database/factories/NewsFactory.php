<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6),
            'content' => fake()->paragraph(3, true),
            'image' => fake()->imageUrl(400, 300, 'motorcycle', true),
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
