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

        News::factory(30)->for($admin)->create()->each(function ($news) use ($users) {
            Comment::factory(rand(0, 10))->for($news)->for($users->random())->create();
        });

        FaqCategory::factory(5)->create()->each(function ($cat) {
            FaqItem::factory(rand(3, 5))->for($cat)->create();
        });

        foreach ($users as $user) {
            Ride::factory(rand(1, 6))->for($user)->create();
        }

        foreach ($users as $user) {
            Message::factory(rand(1, 10))->for($user, 'sender')->for($users->random(), 'receiver')->create();
        }

        ContactSubmission::factory(9)->create();
    }
}
