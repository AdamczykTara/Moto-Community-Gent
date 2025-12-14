<h1>Contactberichten</h1>

@foreach ($submissions as $submission)
    <p>
        <a href="{{ route('admin.contact.show', $submission) }}">
            {{ $submission->subject }} – {{ $submission->name }}
        </a>

        <span>
            @if ($submission->answered)
                (Beantwoord)
            @else
                (Open)
            @endif
        </span>
    </p>
@endforeach
