@extends('layouts.app')

@section('content')
    <h1>Nieuw bericht</h1>

    <form method="POST" action="{{ route('messages.store') }}">
        @csrf

        <label>Ontvanger</label>
        <select name="receiver_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}"
                        @selected(isset($receiverId) && $receiverId == $user->id)
                >
                    {{ $user->username }}
                </option>
            @endforeach
        </select>

        <label>Bericht</label>
        <textarea name="content"></textarea>

        <button
                type="submit"
                class="inline-block mt-2 mb-4 px-4 py-2 text-sm
           border border-blue-600 text-blue-600
           rounded
           hover:bg-blue-50 hover:text-blue-700"
        >
            Verstuur
        </button>
    </form>
@endsection