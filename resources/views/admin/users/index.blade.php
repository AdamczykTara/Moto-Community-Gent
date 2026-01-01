@extends('layouts.app')

@section('content')
    <h1>Gebruikersbeheer</h1>

    <form method="GET" action="{{ route('admin.users.index') }}" style="margin-bottom: 1rem;">
        <input
                type="text"
                name="search"
                placeholder="Zoek op username"
                value="{{ request('search') }}"
        >

        <select name="role">
            <option value="">Alle gebruikers</option>
            <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>
                Enkel admins
            </option>
            <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>
                Enkel niet-admins
            </option>
        </select>

        <button type="submit">Zoek</button>
        <a href="{{ route('admin.users.index') }}">Reset</a>
    </form>

    <a href="{{ route('admin.users.create') }}">Nieuwe gebruiker</a>

    @foreach ($users as $user)
        <div>
            <strong>{{ $user->username }}</strong>
            ({{ $user->email }})
            @if($user->is_admin)
                <span>[Admin]</span>
            @endif

            @if(auth()->id() !== $user->id)
                <form
                        action="{{ route('admin.users.toggleAdmin', $user) }}"
                        method="POST"
                        style="display:inline;"
                >
                    @csrf
                    @method('PATCH')

                    <button
                            type="submit"
                            style="
                            border: 1px solid;
                            padding: 2px 6px;
                            margin-left: 8px;
                            color: {{ $user->is_admin ? 'red' : 'green' }};
                        "
                    >
                        {{ $user->is_admin ? 'Admin afnemen' : 'Admin maken' }}
                    </button>
                </form>
            @else
                <em>(jij)</em>
            @endif

            <a href="{{ route('admin.users.edit', $user) }}">Bewerk</a>

            <form action="{{ route('admin.users.destroy', $user) }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Verwijder</button>
            </form>
        </div>
    @endforeach
@endsection