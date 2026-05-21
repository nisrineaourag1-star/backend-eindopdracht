@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">

        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1506157786151-b8491531f063?auto=format&fit=crop&w=1920&q=80"
                 alt="Tomorrowland festival crowd"
                 class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-festival-dark"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-festival-dark via-transparent to-transparent"></div>
        </div>

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                    w-[800px] h-[800px] bg-amber-500/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="absolute top-24 right-24 w-1 h-1 bg-amber-400 rounded-full opacity-60"></div>
        <div class="absolute top-40 left-36 w-1.5 h-1.5 bg-amber-300 rounded-full opacity-40"></div>
        <div class="absolute bottom-40 right-48 w-1 h-1 bg-yellow-400 rounded-full opacity-50"></div>
        <div class="absolute bottom-24 left-28 w-2 h-2 bg-amber-500 rounded-full opacity-25"></div>

        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto pt-16">

            <div class="inline-flex items-center gap-2 bg-amber-500/10 border border-amber-500/30 rounded-full px-5 py-2 mb-10">
                <span class="w-1.5 h-1.5 bg-amber-400 rounded-full animate-pulse"></span>
                <span class="text-amber-400 text-xs font-bold uppercase tracking-widest">2026 Edition</span>
            </div>

            <h1 class="font-extrabold leading-none tracking-tighter mb-4">
                <span class="block text-white text-7xl sm:text-8xl md:text-9xl">TOMORROW</span>
                <span class="block text-7xl sm:text-8xl md:text-9xl text-gradient-gold">LAND</span>
            </h1>

            <p class="text-gray-200 text-base sm:text-lg font-light tracking-[0.3em] uppercase mt-8 mb-14">
                Where the music changes you forever
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('news.index') }}"
                   class="w-full sm:w-auto bg-amber-500 hover:bg-amber-400 text-black font-bold px-10 py-4
                          rounded-full text-xs uppercase tracking-widest transition-all
                          hover:shadow-xl hover:shadow-amber-500/30 hover:-translate-y-0.5">
                    Discover More
                </a>
                @guest
                    <a href="{{ route('register') }}"
                       class="w-full sm:w-auto border border-white/30 hover:border-amber-500/50 text-white
                              hover:text-amber-400 font-medium px-10 py-4 rounded-full text-xs uppercase
                              tracking-widest transition-all backdrop-blur-sm">
                        Join the Family
                    </a>
                @endguest
            </div>

            <div class="mt-28 flex flex-col items-center gap-2 opacity-50">
                <span class="text-xs text-gray-200 uppercase tracking-widest">Scroll</span>
                <div class="w-px h-12 bg-gradient-to-b from-gray-200 to-transparent"></div>
            </div>
        </div>
    </section>

    <section class="border-y border-gray-800 bg-gray-900/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                @foreach ([
                    ['value' => '400K+', 'label' => 'Visitors'],
                    ['value' => '15',    'label' => 'Stages'],
                    ['value' => '200+',  'label' => 'Artists'],
                    ['value' => '3',     'label' => 'Days'],
                ] as $stat)
                    <div>
                        <p class="text-4xl font-extrabold text-amber-400">{{ $stat['value'] }}</p>
                        <p class="text-gray-500 text-xs mt-2 uppercase tracking-widest font-semibold">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">

        <div class="flex items-end justify-between mb-12">
            <div>
                <p class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-2">Latest Updates</p>
                <h2 class="text-4xl font-extrabold text-white">Festival News</h2>
            </div>
            <a href="{{ route('news.index') }}"
               class="hidden sm:block text-amber-400 hover:text-amber-300 text-sm font-medium transition-colors">
                View all →
            </a>
        </div>

        @php
            $cardPhotos = [
                'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1429962714451-bb934ecdc4ec?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1501386761578-eac5c94b800a?auto=format&fit=crop&w=800&q=80',
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($latestNews as $index => $article)
                <article class="group bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden
                                hover:border-amber-500/30 transition-all duration-300
                                hover:-translate-y-1 hover:shadow-2xl hover:shadow-amber-500/5">

                    <a href="{{ route('news.show', $article) }}" class="block h-48 relative overflow-hidden">
                        <img src="{{ $article->image ? asset('storage/' . $article->image) : ($cardPhotos[$index] ?? $cardPhotos[0]) }}"
                             alt="{{ $article->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        @if ($article->category)
                            <div class="absolute bottom-3 left-3">
                                <span class="bg-amber-500 text-black text-xs font-bold uppercase tracking-wider px-2.5 py-1 rounded">
                                    {{ $article->category->name }}
                                </span>
                            </div>
                        @endif
                    </a>

                    <div class="p-6">
                        <p class="text-gray-600 text-xs mb-2 font-medium">
                            {{ $article->created_at->format('F j, Y') }}
                        </p>
                        <h3 class="text-white font-bold text-lg mb-2 leading-tight
                                   group-hover:text-amber-400 transition-colors">
                            {{ $article->title }}
                        </h3>
                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-2">
                            {{ $article->excerpt }}
                        </p>
                        <div class="mt-5">
                            <a href="{{ route('news.show', $article) }}"
                               class="text-amber-400 text-sm font-medium hover:text-amber-300 transition-colors">
                                Read more →
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <p class="text-gray-500 col-span-3 text-center py-12">No news articles yet.</p>
            @endforelse
        </div>
    </section>

    <section class="relative py-36 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1459749411175-04bf5292ceea?auto=format&fit=crop&w=1920&q=80"
                 alt="Festival stage"
                 class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-black/70"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/50 via-transparent to-black/50"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <p class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-5">The Experience</p>
                <h2 class="text-4xl sm:text-5xl font-extrabold text-white leading-tight mb-6">
                    More Than a Festival.
                    <br>
                    <span class="text-gradient-gold">A State of Mind.</span>
                </h2>
                <p class="text-gray-200 text-lg leading-relaxed mb-10">
                    Tomorrowland is not just music — it is a world where imagination runs free.
                    Every stage, every beat, every moment is crafted to take you somewhere extraordinary.
                </p>
                <a href="{{ route('faq.index') }}"
                   class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-400 text-black font-bold
                          px-8 py-4 rounded-full text-xs uppercase tracking-widest transition-all
                          hover:shadow-xl hover:shadow-amber-500/30">
                    Learn More
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">

        <div class="text-center mb-12">
            <p class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-3">Feel the Magic</p>
            <h2 class="text-4xl font-extrabold text-white">The World of Tomorrowland</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ([
                [
                    'img'   => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?auto=format&fit=crop&w=700&q=80',
                    'label' => 'The Main Stage',
                    'desc'  => 'An engineering marvel visible from anywhere on the grounds',
                ],
                [
                    'img'   => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?auto=format&fit=crop&w=700&q=80',
                    'label' => 'DreamVille',
                    'desc'  => 'Home to 35,000 campers from over 200 countries',
                ],
                [
                    'img'   => 'https://images.unsplash.com/photo-1578946956271-e8234ecaaadd?auto=format&fit=crop&w=700&q=80',
                    'label' => 'The Night Show',
                    'desc'  => 'Pyrotechnics and lasers that light up the Belgian sky',
                ],
            ] as $highlight)
                <div class="group relative h-80 rounded-2xl overflow-hidden">
                    <img src="{{ $highlight['img'] }}"
                         alt="{{ $highlight['label'] }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <p class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-1">{{ $highlight['label'] }}</p>
                        <p class="text-gray-200 text-sm">{{ $highlight['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
