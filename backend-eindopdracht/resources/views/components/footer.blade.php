<footer class="bg-gray-900 border-t border-gray-800 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

            <div>
                <div class="flex items-center gap-0.5 mb-4">
                    <span class="text-amber-400 font-extrabold text-lg tracking-[0.15em]">TOMORROW</span>
                    <span class="text-white font-extrabold text-lg tracking-[0.15em]">LAND</span>
                </div>
                <p class="text-gray-500 text-sm leading-relaxed max-w-xs">
                    The world's greatest festival. An experience that transcends music and transforms lives forever.
                </p>
            </div>

            <div>
                <h3 class="text-white font-semibold text-xs uppercase tracking-widest mb-5">Explore</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('home') }}"
                           class="text-gray-500 hover:text-amber-400 text-sm transition-colors">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') }}"
                           class="text-gray-500 hover:text-amber-400 text-sm transition-colors">
                            News
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('faq.index') }}"
                           class="text-gray-500 hover:text-amber-400 text-sm transition-colors">
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact.index') }}"
                           class="text-gray-500 hover:text-amber-400 text-sm transition-colors">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-semibold text-xs uppercase tracking-widest mb-5">Account</h3>
                <ul class="space-y-3">
                    @auth
                        <li>
                            <a href="{{ route('dashboard') }}"
                               class="text-gray-500 hover:text-amber-400 text-sm transition-colors">
                                My Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit') }}"
                               class="text-gray-500 hover:text-amber-400 text-sm transition-colors">
                                Edit Profile
                            </a>
                        </li>
                        @if (Auth::user()->is_admin ?? false)
                            <li>
                                <a href="{{ route('admin.dashboard') }}"
                                   class="text-amber-400 hover:text-amber-300 text-sm transition-colors font-medium">
                                    Admin Panel
                                </a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="{{ route('login') }}"
                               class="text-gray-500 hover:text-amber-400 text-sm transition-colors">
                                Sign In
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"
                               class="text-gray-500 hover:text-amber-400 text-sm transition-colors">
                                Create Account
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>

        <div class="mt-14 pt-8 border-t border-gray-800 flex flex-col sm:flex-row justify-between items-center gap-4">
            <p class="text-gray-600 text-xs">
                © {{ date('Y') }} Tomorrowland. All rights reserved.
            </p>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                <span class="text-amber-500 text-xs font-semibold uppercase tracking-widest">
                    Live Experience
                </span>
            </div>
        </div>
    </div>
</footer>
