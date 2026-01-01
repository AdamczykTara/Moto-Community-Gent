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
            <a href="{{ route('profile.edit') }}">Profiel bewerken</a>
        @endif
    @endauth

    <hr>

    <h2>Ritten</h2>

    @auth
        @if (auth()->id() === $user->id)
            <a href="{{ route('rides.create') }}">Nieuwe rit</a>
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
                    <a href="{{ route('rides.edit', $ride) }}">Bewerken</a>

                    <form method="POST" action="{{ route('rides.destroy', $ride) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Verwijderen</button>
                    </form>
                @endif
            @endauth
        </article>
    @empty
        <p>Geen ritten toegevoegd.</p>
    @endforelse
@endsection