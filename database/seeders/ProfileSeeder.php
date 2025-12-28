<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\File;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return;
        }

        $profilePictures = collect(
            File::files(storage_path('app/public/profiles'))
        )->map(fn ($file) => 'profiles/' . $file->getFilename());

        $motoPictures = collect(
            File::files(storage_path('app/public/moto'))
        )->map(fn ($file) => 'moto/' . $file->getFilename());

        foreach ($users as $index => $user) {
            Profile::query()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'birthday' => now()->subYears(rand(20, 55))->subDays(rand(0, 365)),
                    'bio' => 'Motorrijder uit Gent met passie voor rijden en community.',
                    'profile_picture' => $profilePictures->random(),
                    'moto_picture' => $motoPictures->random(),
                ]
            );
        }
    }
}
