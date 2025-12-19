@extends('layouts.app')

@section('content')
    <h1>{{ $news->title }}</h1>

    @if ($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="Afbeelding bij nieuwsitem: {{ $news->title }}">
    @endif

    <p>{{ $news->content }}</p>

    <hr>

    <h3>Reacties</h3>

    @foreach ($news->comments as $comment)
        <p>
            <strong>{{ $comment->user->username }}</strong>:
            {{ $comment->comment_text }}
        </p>
    @endforeach

    @auth
        <form method="POST" action="{{ route('news.comments.store', $news) }}">
            @csrf
            <textarea name="comment_text" required></textarea>
            <button type="submit">Reageer</button>
        </form>
    @endauth
@endsection