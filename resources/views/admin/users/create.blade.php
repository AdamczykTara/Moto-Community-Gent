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

        <button type="submit">Opslaan</button>
    </form>
@endsection