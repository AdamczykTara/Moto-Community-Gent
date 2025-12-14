<h1>Contact</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('contact.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Naam">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="subject" placeholder="Onderwerp">
    <textarea name="message" placeholder="Bericht"></textarea>

    <button type="submit">Verstuur</button>
</form>
