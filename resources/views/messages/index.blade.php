@extends('layouts.app')

@section('content')
    <h1>Inbox</h1>

    @forelse($conversations as $userId => $messages)
        @php
            $lastMessage = $messages->first();
            $otherUser = $lastMessage->sender_id === auth()->id()
                ? $lastMessage->receiver
                : $lastMessage->sender;
        @endphp

        <strong>
            <a href="{{ route('profiles.show', $otherUser) }}">
                {{ $otherUser->username }}
            </a>
        </strong><br>

        <a href="{{ route('messages.show', $otherUser) }}">
            <small>{{ Str::limit($lastMessage->content, 40) }}</small>
        </a>

        @if($messages->whereNull('read_at')->where('receiver_id', auth()->id())->count())
            <span class="text-red-600">nieuw</span>
        @endif

        <hr>
    @empty
        <p>Geen berichten</p>
    @endforelse
@endsection