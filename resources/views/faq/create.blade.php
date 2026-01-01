@extends('layouts.app')

@section('content')
    <h1>FAQ toevoegen</h1>

    <form method="POST" action="{{ route('faq.store') }}">
        @csrf

        <label>Categorie</label>
        <select name="faq_category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label>Vraag</label>
        <input type="text" name="question">

        <label>Antwoord</label>
        <textarea name="answer"></textarea>

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
