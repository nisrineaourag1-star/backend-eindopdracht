<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Dashboard') | Tomorrowland Admin</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased bg-gray-950 text-white min-h-screen" x-data="{ sidebarOpen: true }">

        <div class="flex h-screen overflow-hidden">

            <aside class="w-64 bg-gray-900 border-r border-gray-800 flex flex-col flex-shrink-0 overflow-y-auto">

                <div class="px-6 py-5 border-b border-gray-800">
                    <a href="{{ route('home') }}" class="flex items-center gap-1 group">
                        <span class="text-amber-400 font-extrabold text-base tracking-[0.12em] group-hover:text-amber-300 transition-colors">TOMORROW</span>
                        <span class="text-white font-extrabold text-base tracking-[0.12em]">LAND</span>
                    </a>
                    <p class="text-gray-600 text-xs mt-1 uppercase tracking-widest font-medium">Admin Panel</p>
                </div>

                <nav class="flex-1 px-4 py-6 space-y-1">

                    <p class="text-gray-600 text-xs font-semibold uppercase tracking-widest px-3 mb-2">Overview</p>

                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                              {{ request()->routeIs('admin.dashboard') ? 'bg-amber-500/10 text-amber-400 font-semibold' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>

                    <p class="text-gray-600 text-xs font-semibold uppercase tracking-widest px-3 pt-5 pb-2">Content</p>

                    <a href="{{ route('admin.news.index') }}"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                              {{ request()->routeIs('admin.news.*') ? 'bg-amber-500/10 text-amber-400 font-semibold' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                        News Articles
                    </a>

                    <a href="{{ route('admin.faqs.index') }}"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                              {{ request()->routeIs('admin.faqs.*') || request()->routeIs('admin.faq-categories.*') ? 'bg-amber-500/10 text-amber-400 font-semibold' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        FAQ
                    </a>

                    <a href="{{ route('admin.messages.index') }}"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                              {{ request()->routeIs('admin.messages.*') ? 'bg-amber-500/10 text-amber-400 font-semibold' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Messages
                    </a>

                    <p class="text-gray-600 text-xs font-semibold uppercase tracking-widest px-3 pt-5 pb-2">Users</p>

                    <a href="{{ route('admin.users.index') }}"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                              {{ request()->routeIs('admin.users.*') ? 'bg-amber-500/10 text-amber-400 font-semibold' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Manage Users
                    </a>
                </nav>

                <div class="px-4 py-4 border-t border-gray-800">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-8 h-8 rounded-full bg-amber-500 flex items-center justify-center text-black font-bold text-sm flex-shrink-0">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="min-w-0">
                            <p class="text-white text-sm font-medium truncate">{{ Auth::user()->name }}</p>
                            <p class="text-gray-500 text-xs truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="text-xs text-gray-500 hover:text-amber-400 transition-colors w-full text-left">
                            Sign out →
                        </button>
                    </form>
                </div>
            </aside>

            <div class="flex-1 flex flex-col overflow-hidden">

                <header class="bg-gray-900 border-b border-gray-800 px-8 py-4 flex items-center justify-between flex-shrink-0">
                    <div>
                        <h1 class="text-white font-semibold text-lg leading-tight">
                            @yield('page-title', 'Dashboard')
                        </h1>
                        <p class="text-gray-500 text-sm mt-0.5">
                            @yield('page-subtitle', '')
                        </p>
                    </div>
                    <a href="{{ route('home') }}"
                       class="text-gray-400 hover:text-amber-400 text-sm transition-colors">
                        ← View Website
                    </a>
                </header>

                <main class="flex-1 overflow-y-auto p-8">

                    @if (session('success'))
                        <div class="mb-6 bg-green-500/10 border border-green-500/30 text-green-400 rounded-xl px-5 py-3 text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-6 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl px-5 py-3 text-sm">
                            {{ session('error') }}
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>
        </div>

    </body>
</html>
