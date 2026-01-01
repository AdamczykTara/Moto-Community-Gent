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