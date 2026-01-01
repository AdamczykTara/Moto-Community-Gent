@extends('layouts.app')

@section('content')
    <h1>Nieuws bewerken</h1>

    <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label>Titel</label>
        <input type="text" name="title" value="{{ old('title', $news->title) }}">

        <label>Inhoud</label>
        <textarea name="content">{{ old('content', $news->content) }}</textarea>

        @if ($news->image)
            <p>Huidige afbeelding:</p>
            <img src="{{ asset('storage/' . $news->image) }}" alt="Afbeelding bij nieuwsitem: {{ $news->title }}"
                 width="200">
        @endif

        <label>Nieuwe afbeelding</label>
        <input type="file" name="image">

        <br>
        <button
                type="submit"
                class="inline-block mt-2 mb-4 px-4 py-2 text-sm
           border border-blue-600 text-blue-600
           rounded
           hover:bg-blue-50 hover:text-blue-700"
        >
            Opslaan
        </button>
    </form>
@endsection