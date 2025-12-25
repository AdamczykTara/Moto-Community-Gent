<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return;
        }

        $motoPictures = [
            'moto/yamaha-mt07.jpg',
            'moto/kawasaki-z650.jpg',
            'moto/honda-cb650r.jpg',
            'moto/suzuki-sv650.jpg',
            'moto/bmw-r1250gs.jpg',
            'moto/ktm-390-duke.jpg',
            'moto/yamaha-r7.jpg',
            'moto/kawasaki-ninja-650.jpg',
            'moto/honda-cbr500r.jpg',
            'moto/suzuki-vstrom-650.jpg',
            'moto/ducati-monster.jpg',
            'moto/triumph-street-triple.jpg',
            'moto/bmw-f750gs.jpg',
            'moto/ktm-790-adventure.jpg',
            'moto/yamaha-tracer-7.jpg',
            'moto/kawasaki-versys-650.jpg',
            'moto/honda-rebel-500.jpg',
            'moto/suzuki-gsxs750.jpg',
            'moto/aprilia-tuono-660.jpg',
            'moto/royal-enfield-interceptor-650.jpg',
        ];

        $profilePictures = [
            'profiel/avatar1.jpg',
            'profiel/avatar2.jpg',
            'profiel/avatar3.jpg',
            'profiel/avatar4.jpg',
            'profiel/avatar5.jpg',
        ];

        foreach ($users as $index => $user) {
            Profile::query()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'birthday' => now()->subYears(rand(20, 55))->subDays(rand(0, 365)),
                    'bio' => 'Motorrijder uit Gent met passie voor rijden en community.',
                    'profile_picture' => $profilePictures[array_rand($profilePictures)],
                    'moto_picture' => $motoPictures[$index % count($motoPictures)],
                ]
            );
        }
    }
}
