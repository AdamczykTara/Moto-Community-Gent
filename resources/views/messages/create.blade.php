@extends('layouts.app')

@section('content')
    <h1>Nieuw bericht</h1>

    <form method="POST" action="{{ route('messages.store') }}">
        @csrf

        <label>Ontvanger</label>
        <select name="receiver_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>

        <label>Bericht</label>
        <textarea name="content"></textarea>

        <button type="submit">Verstuur</button>
    </form>
@endsection