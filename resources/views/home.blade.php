@extends('layouts.app')

@section('content')
    <h1>Motor Community Gent</h1>

    @if($user)
        <p>
            Welkom {{ $user->username }}

            @if($unreadMessages > 0)
                — <strong>
                    {{ $unreadMessages }}
                    {{ $unreadMessages === 1 ? 'nieuw bericht' : 'nieuwe berichten' }}
                </strong>
            @endif
        </p>
    @endif

    <hr>

    <h2>Laatste nieuws</h2>
    @foreach($news as $item)
        <article>
            <h3>{{ $item->title }}</h3>
            <p>{{ Str::limit($item->content, 150) }}</p>
            <p>
                Gepubliceerd op {{ $item->published_at->format('d/m/Y') }}
                door {{ $item->user->username }}
            </p>
            <a
                    href="{{ route('news.show', $item) }}"
                    class="inline-block mt-0 mb-5 px-3 py-1 text-sm
       border border-blue-600 text-blue-600
       rounded
       hover:bg-blue-50 hover:text-blue-700"
            >
                Lees meer
            </a>
        </article>
    @endforeach

    <hr>

    <h2>Recente ritten</h2>
    <div>
        @foreach($rides as $ride)
            <div>
                <h4>{{ $ride->title }}</h4>

                @if($ride->photo)
                    <img src="{{ asset('storage/' . $ride->photo) }}"
                         alt="Foto van rit {{ $ride->title }}"
                         width="200">
                @endif

                <p>Door {{ $ride->user->username }}</p>
            </div>
        @endforeach
    </div>

    <hr>

    <h2>Actieve leden</h2>
    <div>
        @foreach($members as $member)
            <div>
                <a href="{{ route('profiles.show', $member) }}">
                    {{ $member->username }}
                </a>

                @if($member->profile?->profile_picture)
                    <img src="{{ asset('storage/' . $member->profile->profile_picture) }}"
                         alt="Profielfoto van {{ $member->username }}"
                         width="80">
                @endif
            </div>
        @endforeach
    </div>
@endsection