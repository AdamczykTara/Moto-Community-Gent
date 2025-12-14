<h1>Gebruikersbeheer</h1>

<a href="{{ route('admin.users.create') }}">Nieuwe gebruiker</a>

@foreach ($users as $user)
    <div>
        <strong>{{ $user->username }}</strong>
        ({{ $user->email }})
        @if($user->is_admin)
            <span>[Admin]</span>
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
