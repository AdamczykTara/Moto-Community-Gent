@extends('layouts.app')

@section('content')
    <h1>Contactformulieren</h1>

    @foreach ($contacts as $submission)
        <div class="mb-4 flex items-center justify-between">
            <strong>{{ $submission->name }}</strong>
            ({{ $submission->email }})

            @if(!$submission->answered)
                <span class="text-red-600">
                        [Nog niet beantwoord]
                    </span>
            @else
                <span class="text-green-600">
                        [Beantwoord]
                    </span>
            @endif

            <a
                    href="{{ route('admin.contact.show', $submission) }}"
                    class="px-3 py-1 text-sm
                       border border-blue-600 text-blue-600
                       rounded
                       hover:bg-blue-50 hover:text-blue-700"
            >
                Bekijk
            </a>
        </div>
    @endforeach
@endsection
