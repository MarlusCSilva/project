<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <style>
        .scroll-hidden {
            overflow-y: scroll;
        }
    </style>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased flex flex-col min-h-screen scroll-hidden">
        <header>
            @include('partials.header')
        </header>
        <main class="flex-1">
            @yield('content')
            {{ $slot }}
        </main>   
        <footer>
            @include('partials.footer')
        </footer>
    </body>
</html>
