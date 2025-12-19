@extends('layouts.app')

@section('content')
    <h1>Inbox</h1>

    @foreach($messages as $message)
        <p>
            <a href="{{ route('messages.show', $message) }}">
                Van: {{ $message->sender->username }} |
                {{ $message->created_at->format('d/m/Y H:i') }}
            </a>
            @if(!$message->read_at)
                <strong>(Nieuw)</strong>
            @endif
        </p>
    @endforeach
@endsection