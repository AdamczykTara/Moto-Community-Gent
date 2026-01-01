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

            <button
                    type="submit"
                    class="inline-block mt-2 mb-4 px-4 py-2 text-sm
           border border-blue-600 text-blue-600
           rounded
           hover:bg-blue-50 hover:text-blue-700"
            >
                Verstuur antwoord
            </button>
        </form>
    @else
        <p>Dit bericht is reeds beantwoord.</p>
    @endif

    <a
            href="{{ route('admin.contact.index') }}"
            class="inline-block mt-4
           px-3 py-2 text-sm
           border border-gray-400 text-gray-700
           rounded
           hover:bg-gray-100"
    >
        Terug
    </a>
@endsection