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

        <button type="submit">Opslaan</button>
    </form>
@endsection
