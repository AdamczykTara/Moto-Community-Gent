<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content' => fake()->sentence(10),
            'read_at' => null,
        ];
    }
}
