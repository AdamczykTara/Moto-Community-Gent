<h1>{{ $contactSubmission->subject }}</h1>

<p><strong>Van:</strong> {{ $contactSubmission->name }} ({{ $contactSubmission->email }})</p>
<p>{{ $contactSubmission->message }}</p>

@if (!$contactSubmission->answered_at)
    <form method="POST" action="{{ route('admin.contact.answer', $contactSubmission) }}">
        @csrf
        <textarea name="answer"></textarea>
        <button type="submit">Beantwoord</button>
    </form>
@else
    <p>Dit bericht is al beantwoord.</p>
@endif