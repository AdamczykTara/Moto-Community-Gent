<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $news = News::query()->latest('published_at')
            ->take(5)
            ->get();

        $rides = Ride::with('user')
            ->latest()
            ->take(6)
            ->get();

        $members = User::with('profile')
            ->latest()
            ->take(6)
            ->get();

        $unreadMessages = null;

        if (Auth::check()) {
            $unreadMessages = Auth::user()
                ->receivedMessages()
                ->whereNull('read_at')
                ->count();
        }

        return view('home', compact(
            'news',
            'rides',
            'members',
            'unreadMessages',
            'user'
        ));
    }
}
