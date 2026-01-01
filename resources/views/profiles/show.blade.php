@extends('layouts.app')

@section('content')
    <h1>{{ $user->username }}</h1>

    @if ($user->profile?->profile_picture)
        <img src="{{ asset('storage/' . $user->profile->profile_picture) }}" alt="Profielfoto van {{ $user->username }}"
             width="200">
    @endif

    @if ($user->profile?->moto_picture)
        <img src="{{ asset('storage/' . $user->profile->moto_picture) }}" alt="Motorfiets van {{ $user->username }}"
             width="200">
    @endif

    <p>{{ $user->profile?->bio }}</p>

    @if ($user->profile?->birthday)
        <p>
            <strong>Verjaardag:</strong>
            {{ \Carbon\Carbon::parse($user->profile->birthday)
            ->locale('nl')
            ->translatedFormat('j F') }}
        </p>
    @endif

    @auth
        @if (auth()->id() === $user->id)
            <a
                    href="{{ route('profile.edit') }}"
                    class="inline-block mt-2 mb-4 px-3 py-1 text-sm
           border border-gray-400 text-gray-700
           rounded
           hover:bg-gray-100"
            >
                Profiel bewerken
            </a>
        @endif
    @endauth

    @auth
        @if(auth()->id() !== $user->id)
            <a
                    href="{{ route('messages.create', ['receiver' => $user->id]) }}"
                    class="inline-block mt-0 mb-5 px-3 py-2 text-sm
                   border border-blue-600 text-blue-600
                   rounded
                   hover:bg-blue-50 hover:text-blue-700"
            >
                Bericht sturen
            </a>
        @endif
    @endauth

    <hr>

    <h2>Ritten</h2>

    @auth
        @if (auth()->id() === $user->id)
            <a
                    href="{{ route('rides.create') }}"
                    class="inline-block mt-1 mb-4 px-3 py-1 text-sm
           border border-green-600 text-green-600
           rounded
           hover:bg-green-50 hover:text-green-700"
            >
                + Nieuwe rit
            </a>
        @endif
    @endauth

    @forelse ($user->rides as $ride)
        <article>
            <h3>{{ $ride->title }}</h3>
            <p>{{ $ride->description }}</p>

            @if ($ride->photo)
                <img src="{{ asset('storage/' . $ride->photo) }}" alt="Foto van rit {{ $ride->title }}" width="300">
            @endif

            @auth
                @if (auth()->id() === $ride->user_id)
                    <a
                            href="{{ route('rides.edit', $ride) }}"
                            class="px-2 py-1 text-xs
               border border-gray-400 text-gray-700
               rounded
               hover:bg-gray-100"
                    >
                        Bewerken
                    </a>

                    <form method="POST" action="{{ route('rides.destroy', $ride) }}">
                        @csrf
                        @method('DELETE')
                        <button
                                type="submit"
                                onclick="return confirm('Deze rit verwijderen?')"
                                class="px-2 py-1 text-xs
                   border border-red-600 text-red-600
                   rounded
                   hover:bg-red-50 hover:text-red-700"
                        >
                            Verwijderen
                        </button>
                    </form>
                @endif
            @endauth
        </article>
    @empty
        <p>Geen ritten toegevoegd.</p>
    @endforelse
@endsection