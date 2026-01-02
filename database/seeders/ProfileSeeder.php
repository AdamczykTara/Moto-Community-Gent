<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return;
        }

        $profileDir = storage_path('app/public/profiles');
        $motoDir = storage_path('app/public/moto');

        $profilePictures = collect();
        $motoPictures = collect();

        if (is_dir($profileDir)) {
            $profilePictures = collect(File::files($profileDir))
                ->map(fn ($file) => 'profiles/' . $file->getFilename());
        }

        if (is_dir($motoDir)) {
            $motoPictures = collect(File::files($motoDir))
                ->map(fn ($file) => 'moto/' . $file->getFilename());
        }

        foreach ($users as $index => $user) {
            Profile::query()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'birthday' => now()->subYears(rand(20, 55))->subDays(rand(0, 365)),
                    'bio' => 'Motorrijder uit Gent met passie voor rijden en community.',
                    'profile_picture' => $profilePictures->isNotEmpty()
                        ? $profilePictures->random()
                        : null,
                    'moto_picture' => $motoPictures->isNotEmpty()
                        ? $motoPictures->random()
                        : null,
                ]
            );
        }
    }
}
