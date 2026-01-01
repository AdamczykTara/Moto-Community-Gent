@extends('layouts.app')

@section('content')
    <h1>
        Chat met <a href="{{ route('profiles.show', $user) }}">
            {{ $user->username }}
        </a>
    </h1>

    <div class="space-y-2">
        @foreach($messages as $message)
            <div style="text-align: {{ $message->sender_id === auth()->id() ? 'right' : 'left' }}">
                <strong>
                    {{ $message->sender_id === auth()->id() ? 'Jij' : $user->username }}
                </strong><br>
                {{ $message->content }}
            </div>
        @endforeach
    </div>

    <form method="POST" action="{{ route('messages.store') }}">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $user->id }}">
        <textarea name="content" required></textarea>
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