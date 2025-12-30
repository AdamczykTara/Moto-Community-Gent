@extends('layouts.app')

@section('content')
    <h1>Contactformulier</h1>

    <p><strong>Naam:</strong> {{ $contactSubmission->name }}</p>
    <p><strong>Email:</strong> {{ $contactSubmission->email }}</p>

    @if($contactSubmission->subject)
        <p><strong>Onderwerp:</strong> {{ $contactSubmission->subject }}</p>
    @endif

    <p><strong>Bericht:</strong></p>
    <p>{{ $contactSubmission->message }}</p>

    @if(!$contactSubmission->answered)
        <hr>

        <h2>Antwoord</h2>

        <form
                method="POST"
                action="{{ route('admin.contact.answer', $contactSubmission) }}"
        >
            @csrf

            <textarea name="answer" required></textarea>

            <button type="submit">
                Verstuur antwoord
            </button>
        </form>
    @else
        <p>Dit bericht is reeds beantwoord.</p>
    @endif

    <a href="{{ route('admin.contact.index') }}">Terug</a>
@endsection