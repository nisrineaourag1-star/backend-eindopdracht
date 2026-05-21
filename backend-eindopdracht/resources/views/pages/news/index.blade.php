@extends('layouts.app')

@section('title', 'News')

@section('content')

    <div class="relative pt-28 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?auto=format&fit=crop&w=1920&q=80"
                 alt="Concert crowd"
                 class="w-full h-full object-cover object-top">
            <div class="absolute inset-0 bg-gradient-to-b from-black/75 via-black/65 to-festival-dark"></div>
        </div>
        <div class="relative max-w-7xl mx-auto">
            <p class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-3">Stay Updated</p>
            <h1 class="text-5xl sm:text-6xl font-extrabold text-white">Festival News</h1>
            <p class="text-gray-200 mt-3 text-lg">Everything happening at Tomorrowland</p>
        </div>
    </div>

    <div class="px-4 sm:px-6 lg:px-8 mb-12 mt-6">
        <div class="max-w-7xl mx-auto flex flex-wrap gap-2">
            <a href="{{ route('news.index') }}"
               class="text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full transition-colors
                      {{ ! $currentCategory ? 'bg-amber-500 text-black' : 'border border-gray-700 text-gray-400 hover:border-amber-500/50 hover:text-amber-400' }}">
                All
            </a>
            @foreach ($categories as $cat)
                <a href="{{ route('news.index', ['category' => $cat->slug]) }}"
                   class="text-xs font-medium uppercase tracking-widest px-4 py-2 rounded-full transition-colors
                          {{ $currentCategory === $cat->slug ? 'bg-amber-500 text-black font-bold' : 'border border-gray-700 text-gray-400 hover:border-amber-500/50 hover:text-amber-400' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>
    </div>

    @php
        $fallbackPhotos = [
            'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1429962714451-bb934ecdc4ec?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1501386761578-eac5c94b800a?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1578946956271-e8234ecaaadd?auto=format&fit=crop&w=800&q=80',
        ];
    @endphp

    <div class="px-4 sm:px-6 lg:px-8 pb-16">
        <div class="max-w-7xl mx-auto">

            @if ($news->isEmpty())
                <div class="text-center py-24">
                    <p class="text-gray-500 text-lg">No articles found in this category.</p>
                    <a href="{{ route('news.index') }}" class="text-amber-400 text-sm mt-4 inline-block hover:text-amber-300">
                        View all articles →
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @foreach ($news as $index => $article)
                        <article class="group bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden
                                        hover:border-amber-500/30 transition-all duration-300
                                        hover:-translate-y-1 hover:shadow-2xl hover:shadow-amber-500/5">

                            <a href="{{ route('news.show', $article) }}" class="block h-52 relative overflow-hidden">
                                <img src="{{ $article->image ? asset('storage/' . $article->image) : $fallbackPhotos[$index % count($fallbackPhotos)] }}"
                                     alt="{{ $article->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-transparent to-transparent"></div>
                                @if ($article->category)
                                    <div class="absolute bottom-3 left-3">
                                        <span class="bg-amber-500 text-black text-xs font-bold uppercase tracking-wide px-2.5 py-1 rounded">
                                            {{ $article->category->name }}
                                        </span>
                                    </div>
                                @endif
                            </a>

                            <div class="p-6">
                                <p class="text-gray-600 text-xs mb-2 font-medium">
                                    {{ $article->created_at->format('F j, Y') }}
                                </p>
                                <h2 class="text-white font-bold text-lg mb-2 leading-tight
                                           group-hover:text-amber-400 transition-colors">
                                    {{ $article->title }}
                                </h2>
                                <p class="text-gray-500 text-sm leading-relaxed line-clamp-3">
                                    {{ $article->excerpt }}
                                </p>

                                <div class="mt-5 flex items-center gap-2 pt-4 border-t border-gray-800">
                                    <img src="{{ $article->user?->avatarUrl() ?? 'https://ui-avatars.com/api/?name=A&background=F59E0B&color=000&bold=true&size=32' }}"
                                         alt="{{ $article->user->name ?? 'Admin' }}"
                                         class="w-6 h-6 rounded-full object-cover flex-shrink-0">
                                    <span class="text-gray-500 text-xs">{{ $article->user->name ?? 'Admin' }}</span>
                                    <a href="{{ route('news.show', $article) }}"
                                       class="text-amber-400 hover:text-amber-300 transition-colors text-xs ml-auto">
                                        Read more →
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{ $news->links() }}
            @endif
        </div>
    </div>

@endsection
