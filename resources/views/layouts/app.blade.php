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
                        <a href="{{ route('profile.edit') }}">Profiel</a>
                        <a href="{{ route('messages.index') }}">Berichten</a>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endguest
                </nav>
            </header>

            <main>
                @yield('content')
            </main>

            <footer>
                <p>&copy; {{ date('Y') }} Motor Community Gent</p>
            </footer>
        </div>
    </body>
</html>
