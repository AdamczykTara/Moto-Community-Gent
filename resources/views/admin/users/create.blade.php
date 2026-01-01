@extends('layouts.app')

@section('content')
    <h1>Nieuwe gebruiker</h1>

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <input name="username" placeholder="Username">
        <input name="email" type="email" placeholder="Email">

        <input name="password" type="password" placeholder="Wachtwoord">
        <input name="password_confirmation" type="password" placeholder="Bevestig">

        <label>
            <input type="checkbox" name="is_admin" value="1">
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