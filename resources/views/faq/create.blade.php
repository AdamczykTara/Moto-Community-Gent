<h1>FAQ toevoegen</h1>

<form method="POST" action="{{ route('faq.store') }}">
    @csrf

    <label>Categorie</label>
    <select name="faq_category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <label>Vraag</label>
    <input type="text" name="question">

    <label>Antwoord</label>
    <textarea name="answer"></textarea>

    <button type="submit">Opslaan</button>
</form>
