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

        <br>
        <button
                type="submit"
                class="inline-block mt-2 mb-4 px-4 py-2 text-sm
           border border-blue-600 text-blue-600
           rounded
           hover:bg-blue-50 hover:text-blue-700"
        >
            Aanmaken
        </button>
    </form>
@endsection