@extends('layouts.app')

@section('content')
    <h1>Bericht van {{ $message->sender->username }}</h1>
    <p>{{ $message->content }}</p>
    <p>Verzonden op {{ $message->created_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('messages.index') }}">Terug naar inbox</a>
@endsection