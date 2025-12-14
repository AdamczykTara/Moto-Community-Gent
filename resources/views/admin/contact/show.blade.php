<h1>Contactformulier</h1>

<p><strong>Naam:</strong> {{ $contactSubmission->name }}</p>
<p><strong>Email:</strong> {{ $contactSubmission->email }}</p>

@if($contactSubmission->subject)
    <p><strong>Onderwerp:</strong> {{ $contactSubmission->subject }}</p>
@endif

<p><strong>Bericht:</strong></p>
<p>{{ $contactSubmission->message }}</p>

<a href="{{ route('admin.contact.index') }}">Terug</a>