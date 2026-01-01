@extends('layouts.app')

@section('content')
    <h1>Profiel bewerken</h1>

    <form method="POST" action="{{ route('profiles.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label>Geboortedatum</label>
        <input type="date" name="birthday" value="{{ old('birthday', $profile->birthday) }}">

        <label>Over mij</label>
        <textarea name="bio">{{ old('bio', $profile->bio) }}</textarea>

        <label>Profielfoto</label>
        <input type="file" name="profile_picture">

        <label>Moto foto</label>
        <input type="file" name="moto_picture">

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