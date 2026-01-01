@extends('layouts.app')

@section('content')
    <h1>FAQ-categorie bewerken</h1>

    <form method="POST" action="{{ route('faq.categories.update', $category) }}">
        @csrf
        @method('PATCH')

        <input type="text" name="name" value="{{ $category->name }}" required>
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