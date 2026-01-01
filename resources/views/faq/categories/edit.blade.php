@extends('layouts.app')

@section('content')
    <h1>FAQ-categorie bewerken</h1>

    <form method="POST" action="{{ route('faq.categories.update', $category) }}">
        @csrf
        @method('PATCH')

        <input type="text" name="name" value="{{ $category->name }}" required>
        <button type="submit">Opslaan</button>
    </form>
@endsection