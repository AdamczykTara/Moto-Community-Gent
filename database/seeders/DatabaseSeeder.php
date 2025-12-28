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
        Profile::factory()->for($admin)->create();

        $admins = User::factory(4)
            ->admin()
            ->create();

        $admins->each(function ($admin) {
            Profile::factory()->for($admin)->create();
        });

        $users = User::factory(45)->create();
        foreach ($users as $user) {
            Profile::factory()->for($user)->create();
        }

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
        /*foreach ($users as $user) {
            Ride::factory(rand(1, 6))->for($user)->create();
        }*/

        $this->call([MessageSeeder::class]);
        /*foreach ($users as $user) {
            Message::factory(rand(1, 10))->for($user, 'sender')->for($users->random(), 'receiver')->create();
        }*/

        ContactSubmission::factory(9)->create();
    }
}
