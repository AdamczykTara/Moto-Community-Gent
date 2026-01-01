@extends('layouts.app')

@section('content')
    <h1>FAQ-categorie toevoegen</h1>

    <form method="POST" action="{{ route('faq.categories.store') }}">
        @csrf
        <input type="text" name="name" required>
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
