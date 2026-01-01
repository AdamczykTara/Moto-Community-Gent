@extends('layouts.app')

@section('content')
    <h1>{{ $news->title }}</h1>

    <p>
        Gepubliceerd op {{ $news->published_at->format('d/m/Y') }}
        door {{ $news->user->username }}
    </p>

    @auth
        @if(auth()->user()->isAdmin())
            <div class="flex gap-2 mb-4">
                <a
                        href="{{ route('news.edit', $news) }}"
                        class="px-2 py-1 text-xs
                           border border-gray-400 text-gray-700
                           rounded hover:bg-gray-100"
                >
                    Bewerken
                </a>

                <form method="POST" action="{{ route('news.destroy', $news) }}">
                    @csrf
                    @method('DELETE')
                    <button
                            type="submit"
                            onclick="return confirm('Nieuwsitem definitief verwijderen?')"
                            class="px-2 py-1 text-xs
                               border border-red-600 text-red-600
                               rounded hover:bg-red-50 hover:text-red-700"
                    >
                        Verwijderen
                    </button>
                </form>
            </div>
        @endif
    @endauth

    @if ($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="Afbeelding bij nieuwsitem: {{ $news->title }}">
    @endif

    <p>{{ $news->content }}</p>

    <hr>

    <h3>Reacties ({{ $news->comments->count() }})</h3>

    @foreach ($news->comments as $comment)
        <div class="flex items-start justify-between mb-2">
            <p>
                <a href="{{ route('profiles.show', $comment->user) }}">
                    <strong>{{ $comment->user->username }}</strong>
                </a>
                {{ $comment->comment_text }}
            </p>
            @auth
                @if(auth()->user()->isAdmin() || auth()->id() === $comment->user_id)
                    <form method="POST" action="{{ route('comments.destroyComment', $comment) }}">
                        @csrf
                        @method('DELETE')
                        <button
                                type="submit"
                                class="ml-4 px-2 py-1 text-xs border border-red-600 text-red-600 rounded hover:bg-red-50 hover:text-red-700"
                        >
                            Verwijder
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    @endforeach

    @auth
        <form method="POST" action="{{ route('news.comments.store', $news) }}">
            @csrf
            <textarea name="comment_text" required></textarea>
            <button type="submit">Reageer</button>
        </form>
    @endauth
@endsection