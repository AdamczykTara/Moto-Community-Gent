<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    public function definition(): array
    {
        return [
            'birthday' => fake()->date(),
            'bio' => fake()->paragraph(2),
            'profile_picture' => fake()->imageUrl(400, 300, 'profile', true),
            'moto_picture' => fake()->imageUrl(400, 300, 'motorcycle', true),
        ];
    }
}
