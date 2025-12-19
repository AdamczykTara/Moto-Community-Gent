@extends('layouts.app')

@section('content')
    <h1>Nieuws aanmaken</h1>

    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @csrf

        <label>Titel</label>
        <input type="text" name="title" value="{{ old('title') }}">

        <label>Inhoud</label>
        <textarea name="content">{{ old('content') }}</textarea>

        <label>Afbeelding</label>
        <input type="file" name="image">

        <button type="submit">Aanmaken</button>
    </form>
@endsection