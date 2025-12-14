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
        $user = Auth::user();

        $messages = $user->receivedMessages()
            ->with('sender')
            ->orderByDesc('created_at')
            ->get();

        return view('messages.index', compact('messages'));
    }

    public function show(Message $message): View
    {
        $userId = Auth::id();

        if ($message->receiver_id !== $userId && $message->sender_id !== $userId) {
            abort(403);
        }

        if ($message->receiver_id === $userId && !$message->read_at) {
            $message->update(['read_at' => now()]);
        }

        return view('messages.show', compact('message'));
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
