@extends('layouts.app')

@section('content')
    <h1>Contact</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('contact.store') }}">
        @csrf

        <input type="text" name="name" placeholder="Naam">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="subject" placeholder="Onderwerp">
        <textarea name="message" placeholder="Bericht"></textarea>

        <br>
        <button
                type="submit"
                class="inline-block mt-2 mb-4 px-4 py-2 text-sm
           border border-blue-600 text-blue-600
           rounded
           hover:bg-blue-50 hover:text-blue-700"
        >
            Verstuur
        </button>
    </form>
@endsection
