<h1>Contactformulieren</h1>

@foreach ($submissions as $submission)
    <div>
        <strong>{{ $submission->name }}</strong>
        ({{ $submission->email }})

        @if(!$submission->read_at)
            <span>[Nieuw]</span>
        @endif

        <a href="{{ route('admin.contact.show', $submission) }}">
            Bekijk
        </a>
    </div>
@endforeach
