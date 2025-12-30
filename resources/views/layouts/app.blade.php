<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Motor Community Gent</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <header>
                <nav>
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('news.index') }}">Nieuws</a>
                    <a href="{{ route('faq.index') }}">FAQ</a>
                    <a href="{{ route('contact.create') }}">Contact</a>

                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.contact.index') }}">
                                Inzendingen
                            </a>
                        @endif
                    @endauth

                    @auth
                        <a href="{{ route('profiles.show', auth()->user()) }}">Profiel</a>
                        <a href="{{ route('messages.index') }}">Berichten</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="ml-4 text-sm text-red-600">
                                Logout
                            </button>
                        </form>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endguest
                </nav>
            </header>

            <main class="max-w-5xl mx-auto px-6 py-10">
                <div class="page-content">
                    @yield('content')
                </div>
            </main>

            <footer>
                <p>&copy; {{ date('Y') }} Motor Community Gent</p>
            </footer>
        </div>
    </body>
</html>
