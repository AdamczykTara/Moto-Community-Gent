<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $authId = Auth::id();

        $messages = Message::query()
            ->where('sender_id', $authId)
            ->orWhere('receiver_id', $authId)
            ->with(['sender', 'receiver'])
            ->orderByDesc('created_at')
            ->get();

        $conversations = $messages->groupBy(function ($message) use ($authId) {
            return $message->sender_id === $authId
                ? $message->receiver_id
                : $message->sender_id;
        });

        return view('messages.index', compact('conversations'));
    }

    public function show(User $user): View
    {
        $authId = Auth::id();

        $messages = Message::query()
            ->where(function ($q) use ($authId, $user) {
                $q->where('sender_id', $authId)
                    ->where('receiver_id', $user->id);
            })
            ->orWhere(function ($q) use ($authId, $user) {
                $q->where('sender_id', $user->id)
                    ->where('receiver_id', $authId);
            })
            ->orderBy('created_at')
            ->get();

        Message::query()->where('sender_id', $user->id)
            ->where('receiver_id', $authId)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return view('messages.show', compact('messages', 'user'));
    }

    public function create(): View
    {
        $users = User::query()->where('id', '<>', Auth::id())->get();
        return view('messages.create', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'receiver_id' => ['required', 'exists:users,id'],
            'content'     => ['required', 'string'],
        ]);

        $validated['sender_id'] = Auth::id();

        Message::query()->create($validated);

        return redirect()->route('messages.index')->with('success', 'Bericht verzonden!');
    }
}
