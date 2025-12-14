<h1>Profiel bewerken</h1>

<form method="POST" action="{{ route('profiles.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <label>Geboortedatum</label>
    <input type="date" name="birthday" value="{{ old('birthday', $profile->birthday) }}">

    <label>Over mij</label>
    <textarea name="bio">{{ old('bio', $profile->bio) }}</textarea>

    <label>Profielfoto</label>
    <input type="file" name="profile_picture">

    <label>Moto foto</label>
    <input type="file" name="moto_picture">

    <button type="submit">Opslaan</button>
</form>
