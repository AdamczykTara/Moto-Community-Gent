@extends('layouts.app')

@section('content')
    <h1>FAQ bewerken</h1>

    <form method="POST" action="{{ route('faq.update', $faq) }}">
        @csrf
        @method('PATCH')

        <label>Categorie</label>
        <select name="faq_category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                        @selected($category->id === $faq->faq_category_id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label>Vraag</label>
        <input type="text" name="question" value="{{ old('question', $faq->question) }}">

        <label>Antwoord</label>
        <textarea name="answer">{{ old('answer', $faq->answer) }}</textarea>

        <button type="submit">Opslaan</button>
    </form>
@endsection