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

        <button
                type="submit"
                class="px-3 py-1 text-sm
           border border-blue-600 text-blue-600
           rounded
           hover:bg-blue-50 hover:text-blue-700"
        >
            Zoek
        </button>

        <a
                href="{{ route('admin.users.index') }}"
                class="px-3 py-1 text-sm
           border border-gray-400 text-gray-700
           rounded
           hover:bg-gray-100"
        >
            Reset
        </a>
    </form>

    <a
            href="{{ route('admin.users.create') }}"
            class="inline-block mb-4
           px-3 py-2 text-sm
           border border-green-600 text-green-600
           rounded
           hover:bg-green-50 hover:text-green-700"
    >
        + Nieuwe gebruiker
    </a>

    @foreach ($users as $user)
        <div class="mb-6 flex items-center justify-between">
            <strong>{{ $user->username }}</strong>
            ({{ $user->email }})
            @if($user->is_admin)
                <span class="text-green-600">[Admin]</span>
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
                            class="px-2 py-1 text-xs
                                   border {{ $user->is_admin ? 'border-red-600 text-red-600 hover:bg-red-50 hover:text-red-700'
                                                            : 'border-green-600 text-green-600 hover:bg-green-50 hover:text-green-700' }}
                                   rounded"
                    >
                        {{ $user->is_admin ? 'Admin afnemen' : 'Admin maken' }}
                    </button>
                </form>
            @else
                <em>(jij)</em>
            @endif

            <a
                    href="{{ route('admin.users.edit', $user) }}"
                    class="px-2 py-1 text-xs
                           border border-gray-400 text-gray-700
                           rounded
                           hover:bg-gray-100"
            >
                Bewerk
            </a>

            <form action="{{ route('admin.users.destroy', $user) }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                @method('DELETE')
                <button
                        type="submit"
                        onclick="return confirm('Gebruiker verwijderen?')"
                        class="px-2 py-1 text-xs
                               border border-red-600 text-red-600
                               rounded
                               hover:bg-red-50 hover:text-red-700"
                >
                    Verwijder
                </button>
            </form>
        </div>
    @endforeach
@endsection