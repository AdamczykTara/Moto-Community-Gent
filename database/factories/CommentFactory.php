<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'comment_text' => fake()->sentence(10),
            'user_id' => User::query()->inRandomOrder()->value('id'),
        ];
    }
}