@extends('layouts.app')

@section('content')
    <h1>Rit bewerken</h1>

    <form method="POST" action="{{ route('rides.update', $ride) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label>Titel</label>
        <input type="text" name="title" value="{{ old('title', $ride->title) }}">

        <label>Beschrijving</label>
        <textarea name="description">{{ old('description', $ride->description) }}</textarea>

        @if ($ride->photo)
            <img src="{{ asset('storage/' . $ride->photo) }}" alt="Foto van rit {{ $ride->title }}" width="300">
        @endif

        <label>Nieuwe foto</label>
        <input type="file" name="photo">

        <button type="submit">Opslaan</button>
    </form>
@endsection