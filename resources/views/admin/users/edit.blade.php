@extends('layouts.app')

@section('content')
    <h1>Gebruiker bewerken</h1>

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')

        <input name="username" value="{{ $user->username }}">
        <input name="email" type="email" value="{{ $user->email }}">

        <label>
            <input type="checkbox" name="is_admin" value="1"
                    @checked($user->is_admin)>
            Admin
        </label>

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
