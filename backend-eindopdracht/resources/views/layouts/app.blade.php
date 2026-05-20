<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Tomorrowland') | Tomorrowland</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('styles')
    </head>

    <body class="font-sans antialiased bg-festival-dark text-white min-h-screen flex flex-col">

        <x-navbar />

        @if (session('success'))
            <div class="bg-amber-500 text-black text-center py-3 px-4 text-sm font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-600 text-white text-center py-3 px-4 text-sm font-semibold">
                {{ session('error') }}
            </div>
        @endif

        <main class="flex-1">
            @isset($slot)
                {{ $slot }}
            @endisset
            @yield('content')
        </main>

        <x-footer />

        @stack('scripts')
    </body>
</html>
