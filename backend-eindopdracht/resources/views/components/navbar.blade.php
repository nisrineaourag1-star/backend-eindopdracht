<nav class="fixed top-0 left-0 right-0 z-50 bg-[#0d0d0d]/95 backdrop-blur-md border-b border-white/5"
     x-data="{ mobileOpen: false }">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <a href="{{ route('home') }}" class="flex items-center gap-0.5 group flex-shrink-0">
                <span class="text-amber-400 font-extrabold text-lg tracking-[0.15em] group-hover:text-amber-300 transition-colors">
                    TOMORROW
                </span>
                <span class="text-white font-extrabold text-lg tracking-[0.15em]">
                    LAND
                </span>
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}"
                   class="text-xs font-semibold uppercase tracking-widest transition-colors
                          {{ request()->routeIs('home') ? 'text-amber-400' : 'text-gray-400 hover:text-white' }}">
                    Home
                </a>
                <a href="{{ route('news.index') }}"
                   class="text-xs font-semibold uppercase tracking-widest transition-colors
                          {{ request()->routeIs('news.*') ? 'text-amber-400' : 'text-gray-400 hover:text-white' }}">
                    News
                </a>
                <a href="{{ route('faq.index') }}"
                   class="text-xs font-semibold uppercase tracking-widest transition-colors
                          {{ request()->routeIs('faq.*') ? 'text-amber-400' : 'text-gray-400 hover:text-white' }}">
                    FAQ
                </a>
                <a href="{{ route('contact.index') }}"
                   class="text-xs font-semibold uppercase tracking-widest transition-colors
                          {{ request()->routeIs('contact.*') ? 'text-amber-400' : 'text-gray-400 hover:text-white' }}">
                    Contact
                </a>
            </div>

            <div class="hidden md:flex items-center gap-4">
                @auth
                    @if (Auth::user()->is_admin ?? false)
                        <a href="{{ route('admin.dashboard') }}"
                           class="text-xs font-bold uppercase tracking-widest bg-amber-500 hover:bg-amber-400 text-black px-3 py-1.5 rounded transition-colors">
                            Admin
                        </a>
                    @endif

                    <a href="{{ route('profile.edit') }}"
                       class="text-gray-300 hover:text-white text-sm transition-colors truncate max-w-[120px]">
                        {{ Auth::user()->name }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="text-xs text-gray-500 hover:text-white transition-colors uppercase tracking-wider">
                            Sign out
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="text-sm text-gray-400 hover:text-white transition-colors tracking-wide">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}"
                       class="text-xs font-bold uppercase tracking-widest bg-amber-500 hover:bg-amber-400 text-black px-5 py-2 rounded-full transition-all hover:shadow-lg hover:shadow-amber-500/20">
                        Join
                    </a>
                @endauth
            </div>

            <button @click="mobileOpen = !mobileOpen"
                    class="md:hidden text-gray-400 hover:text-white transition-colors p-1">
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <div x-show="mobileOpen"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="md:hidden bg-gray-900 border-t border-gray-800 px-4 py-5 space-y-3"
         style="display: none;">

        <a href="{{ route('home') }}"
           class="block text-sm py-1 {{ request()->routeIs('home') ? 'text-amber-400' : 'text-gray-300' }} uppercase tracking-widest font-medium">
            Home
        </a>
        <a href="{{ route('news.index') }}"
           class="block text-sm py-1 {{ request()->routeIs('news.*') ? 'text-amber-400' : 'text-gray-300' }} uppercase tracking-widest font-medium">
            News
        </a>
        <a href="{{ route('faq.index') }}"
           class="block text-sm py-1 {{ request()->routeIs('faq.*') ? 'text-amber-400' : 'text-gray-300' }} uppercase tracking-widest font-medium">
            FAQ
        </a>
        <a href="{{ route('contact.index') }}"
           class="block text-sm py-1 {{ request()->routeIs('contact.*') ? 'text-amber-400' : 'text-gray-300' }} uppercase tracking-widest font-medium">
            Contact
        </a>

        <div class="pt-3 border-t border-gray-800 flex flex-col gap-3">
            @auth
                <a href="{{ route('profile.edit') }}" class="text-sm text-gray-300">
                    {{ Auth::user()->name }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-gray-500">Sign out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-300">Sign in</a>
                <a href="{{ route('register') }}"
                   class="inline-block text-xs font-bold uppercase tracking-widest bg-amber-500 text-black px-5 py-2 rounded-full text-center">
                    Join
                </a>
            @endauth
        </div>
    </div>
</nav>
