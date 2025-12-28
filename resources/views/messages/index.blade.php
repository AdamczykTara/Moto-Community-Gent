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

        <a href="{{ route('messages.show', $otherUser) }}">
            <strong>{{ $otherUser->username }}</strong><br>
            <small>{{ Str::limit($lastMessage->content, 40) }}</small>
        </a>

        @if($messages->whereNull('read_at')->where('receiver_id', auth()->id())->count())
            <span>- nieuw</span>
        @endif

        <hr>
    @empty
        <p>Geen berichten</p>
    @endforelse
@endsection