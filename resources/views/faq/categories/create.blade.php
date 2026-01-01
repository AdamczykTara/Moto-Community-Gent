@extends('layouts.app')

@section('content')
    <h1>FAQ-categorie toevoegen</h1>

    <form method="POST" action="{{ route('faq.categories.store') }}">
        @csrf
        <input type="text" name="name" required>
        <button type="submit">Opslaan</button>
    </form>
@endsection
