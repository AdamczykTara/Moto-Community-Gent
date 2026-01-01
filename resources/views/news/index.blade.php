@extends('layouts.app')

@section('content')
    <h1>Nieuws</h1>

    @auth
        @if(auth()->user()->isAdmin())
            <a
                    href="{{ route('news.create') }}"
                    class="inline-block mb-4 px-3 py-2
                       border border-gray-500 rounded
                       hover:bg-gray-100"
            >
                + Nieuw nieuwsitem
            </a>
        @endif
    @endauth

    @foreach ($news as $item)
        <article>
            <h2>
                <a href="{{ route('news.show', $item) }}">
                    {{ $item->title }}
                </a>
            </h2>
            <p>
                Gepubliceerd op {{ $item->published_at->format('d/m/Y') }}
                door {{ $item->user->username }}
            </p>

            @auth
                @if(auth()->user()->isAdmin())
                    <div class="flex gap-2 mt-2">
                        <a
                                href="{{ route('news.edit', $item) }}"
                                class="px-2 py-1 text-xs
                                   border border-gray-400 text-gray-700
                                   rounded hover:bg-gray-100"
                        >
                            Bewerken
                        </a>

                        <form method="POST" action="{{ route('news.destroy', $item) }}">
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

        </article>
    @endforeach

    {{ $news->links() }}
@endsection