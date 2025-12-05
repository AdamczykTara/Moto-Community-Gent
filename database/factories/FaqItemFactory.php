<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FaqItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => fake()->sentence(6),
            'answer' => fake()->paragraph(2),
        ];
    }
}
