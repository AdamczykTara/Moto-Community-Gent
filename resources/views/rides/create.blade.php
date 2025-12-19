@extends('layouts.app')

@section('content')
    <h1>Nieuwe rit</h1>

    <form method="POST" action="{{ route('rides.store') }}" enctype="multipart/form-data">
        @csrf

        <label>Titel</label>
        <input type="text" name="title">

        <label>Beschrijving</label>
        <textarea name="description"></textarea>

        <label>Foto</label>
        <input type="file" name="photo">

        <button type="submit">Toevoegen</button>
    </form>
@endsection