<nav class="bg-black border-b border-gray-200 px-6 py-3 flex gap-4 items-center">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('news.index') }}">Nieuws</a>
    <a href="{{ route('faq.index') }}">FAQ</a>
    <a href="{{ route('contact.create') }}">Contact</a>

    @auth
        @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.contact.index') }}">Inzendingen</a>
            <a href="{{ route('admin.users.index') }}">Gebruikersbeheer</a>
        @endif

        <a href="{{ route('profiles.show', auth()->user()) }}">Profiel</a>
        <a href="{{ route('messages.index') }}">Berichten</a>

        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-red-600">
                Logout
            </button>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endguest
</nav>