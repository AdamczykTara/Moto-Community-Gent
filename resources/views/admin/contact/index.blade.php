@extends('layouts.app')

@section('content')
    <h1>Contactformulieren</h1>

    @foreach ($contacts as $submission)
        <div>
            <strong>{{ $submission->name }}</strong>
            ({{ $submission->email }})

            @if(!$submission->answered)
                <span>[Nog niet beantwoord]</span>
            @else
                <span>[Beantwoord]</span>
            @endif

            <a href="{{ route('admin.contact.show', $submission) }}">
                Bekijk
            </a>
        </div>
    @endforeach
@endsection
