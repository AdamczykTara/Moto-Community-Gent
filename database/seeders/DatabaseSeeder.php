<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use App\Models\News;
use App\Models\Comment;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use App\Models\Ride;
use App\Models\Message;
use App\Models\ContactSubmission;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $admin = User::factory()
            ->admin()
            ->create([
                'username' => 'admin',
                'email' => 'admin@ehb.be',
                'password' => bcrypt('Password!321'),
            ]);

        $admins = User::factory(4)
            ->admin()
            ->create();

        $users = User::factory(45)->create();

        $this->call(NewsSeeder::class);
        News::all()->each(function ($news) {
            Comment::factory(rand(0, 10))
                ->for($news)
                ->create();
        });

        $this->call([
            FaqCategorySeeder::class,
            FaqItemSeeder::class,
        ]);

        $this->call(RideSeeder::class);

        $this->call([MessageSeeder::class]);

        ContactSubmission::factory(9)->create();

        $this->call(ProfileSeeder::class);
    }
}
