<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        if (User::query()->count() < 3) {
            User::factory(10)->create();
        }

        $users = User::all();

        foreach ($users as $user) {

            $partners = $users
                ->where('id', '!=', $user->id)
                ->random(rand(2, min(6, $users->count() - 1)));

            foreach ($partners as $partner) {

                $exists = Message::query()
                    ->where(function ($q) use ($user, $partner) {
                        $q->where('sender_id', $user->id)
                            ->where('receiver_id', $partner->id);
                    })
                    ->orWhere(function ($q) use ($user, $partner) {
                        $q->where('sender_id', $partner->id)
                            ->where('receiver_id', $user->id);
                    })
                    ->exists();

                if ($exists) {
                    continue;
                }

                $messageCount = rand(3, 8);
                $lastSenderId = null;

                for ($i = 0; $i < $messageCount; $i++) {

                    $senderId = $lastSenderId === $user->id
                        ? $partner->id
                        : $user->id;

                    $receiverId = $senderId === $user->id
                        ? $partner->id
                        : $user->id;

                    Message::query()->create([
                        'sender_id' => $senderId,
                        'receiver_id' => $receiverId,
                        'content' => fake()->sentence(rand(5, 15)),
                        'created_at' => now()->subMinutes(rand(1, 10000)),
                        'read_at' => rand(0, 1) ? now() : null,
                    ]);

                    $lastSenderId = $senderId;
                }
            }
        }
    }
}
