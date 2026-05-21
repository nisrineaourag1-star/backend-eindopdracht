@extends('layouts.app')

@section('title', 'FAQ')

@section('content')

    <div class="relative pt-28 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1665035212282-3e117d618b36?auto=format&fit=crop&w=1920&q=80"
                 alt="Festival crowd"
                 class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/70 to-festival-dark"></div>
        </div>
        <div class="relative max-w-3xl mx-auto text-center">
            <p class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-4">Got Questions?</p>
            <h1 class="text-5xl sm:text-6xl font-extrabold text-white leading-tight">
                Frequently
                <span class="text-gradient-gold">Asked</span>
            </h1>
            <p class="text-gray-300 mt-5 text-lg">
                Everything you need to know before you experience Tomorrowland
            </p>
        </div>
    </div>

    <div class="px-4 sm:px-6 lg:px-8 pb-16 max-w-3xl mx-auto">

        @forelse ($faqCategories as $category)
            @if ($category->activeFaqs->isNotEmpty())
                <div class="mb-12">
                    <h2 class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-5 flex items-center gap-3">
                        {{ $category->name }}
                        <span class="flex-1 border-t border-gray-800"></span>
                    </h2>

                    <div class="space-y-3">
                        @foreach ($category->activeFaqs as $index => $faq)
                            <div class="border border-gray-800 rounded-xl overflow-hidden hover:border-amber-500/20 transition-colors"
                                 x-data="{ open: {{ $index === 0 ? 'true' : 'false' }} }">

                                <button @click="open = !open"
                                        class="w-full flex items-center justify-between px-6 py-5 text-left transition-colors"
                                        :class="open ? 'bg-gray-900' : 'bg-gray-900/50 hover:bg-gray-900'">
                                    <span class="font-semibold text-white text-sm pr-8">{{ $faq->question }}</span>
                                    <span class="text-amber-400 flex-shrink-0">
                                        <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                        <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                        </svg>
                                    </span>
                                </button>

                                <div x-show="open"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 -translate-y-1"
                                     x-transition:enter-end="opacity-100 translate-y-0"
                                     class="px-6 pb-5 bg-gray-900 border-t border-gray-800">
                                    <p class="text-gray-400 text-sm leading-relaxed pt-4">{{ $faq->answer }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @empty
            <p class="text-gray-500 text-center py-16">No FAQ items yet.</p>
        @endforelse
    </div>

    <div class="px-4 sm:px-6 lg:px-8 pb-24 max-w-3xl mx-auto">
        <div class="text-center p-10 bg-gray-900 border border-gray-800 rounded-2xl">
            <h3 class="text-white font-extrabold text-2xl mb-2">Still have questions?</h3>
            <p class="text-gray-400 text-sm mb-8 max-w-sm mx-auto">
                Our team is happy to help with anything not covered here.
            </p>
            <a href="{{ route('contact.index') }}"
               class="inline-block bg-amber-500 hover:bg-amber-400 text-black font-bold px-8 py-3
                      rounded-full text-xs uppercase tracking-widest transition-all
                      hover:shadow-lg hover:shadow-amber-500/20">
                Contact Us
            </a>
        </div>
    </div>

@endsection
