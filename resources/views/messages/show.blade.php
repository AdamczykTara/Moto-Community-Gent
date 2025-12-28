@extends('layouts.app')

@section('content')
    <h1>Chat met {{ $user->username }}</h1>

    <div class="space-y-2">
        @foreach($messages as $message)
            <div style="text-align: {{ $message->sender_id === auth()->id() ? 'right' : 'left' }}">
                <strong>
                    {{ $message->sender_id === auth()->id() ? 'Jij' : $user->username }}
                </strong><br>
                {{ $message->content }}
            </div>
        @endforeach
    </div>

    <form method="POST" action="{{ route('messages.store') }}">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $user->id }}">
        <textarea name="content" required></textarea>
        <button type="submit">Verstuur</button>
    </form>
@endsection