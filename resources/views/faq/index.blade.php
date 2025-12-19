@extends('layouts.app')

@section('content')
    <h1>FAQ</h1>

    @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>

        @foreach ($category->faqItems as $faq)
            <p><strong>{{ $faq->question }}</strong></p>
            <p>{{ $faq->answer }}</p>

            @auth
                @if(auth()->user()?->isAdmin())
                    <a href="{{ route('faq.edit', $faq) }}">Bewerken</a>
                    <form method="POST" action="{{ route('faq.destroy', $faq) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Verwijderen</button>
                    </form>
                @endif
            @endauth
        @endforeach
    @endforeach
@endsection