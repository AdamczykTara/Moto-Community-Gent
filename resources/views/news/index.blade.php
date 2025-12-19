@extends('layouts.app')

@section('content')
    <h1>Nieuws</h1>

    @foreach ($news as $item)
        <article>
            <h2>
                <a href="{{ route('news.show', $item) }}">
                    {{ $item->title }}
                </a>
            </h2>
            <p>Door {{ $item->user->username }}</p>
        </article>
    @endforeach

    {{ $news->links() }}
@endsection