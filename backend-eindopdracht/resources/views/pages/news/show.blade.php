@extends('layouts.app')

@section('title', $news->title)

@section('content')

    <div class="pt-28">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 text-center">

            <div class="inline-flex items-center gap-3 mb-8">
                @if ($news->category)
                    <span class="bg-amber-500 text-black text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full">
                        {{ $news->category->name }}
                    </span>
                @endif
                <span class="text-gray-500 text-sm">
                    {{ ($news->published_at ?? $news->created_at)->format('F j, Y') }}
                </span>
            </div>

            <h1 class="text-4xl sm:text-5xl font-extrabold text-white leading-tight mb-6">
                {{ $news->title }}
            </h1>

            @if ($news->excerpt)
                <p class="text-gray-400 text-xl leading-relaxed mb-10">
                    {{ $news->excerpt }}
                </p>
            @endif

            <div class="flex items-center justify-center gap-4 text-sm text-gray-500 pb-10 border-b border-gray-800">
                <div class="flex items-center gap-2">
                    <img src="{{ $news->user?->avatarUrl() ?? 'https://ui-avatars.com/api/?name=A&background=F59E0B&color=000&bold=true&size=64' }}"
                         alt="{{ $news->user->name ?? 'Admin' }}"
                         class="w-8 h-8 rounded-full object-cover">
                    <span>By
                        @if ($news->user)
                            <a href="{{ route('profile.show', $news->user) }}"
                               class="text-amber-400 hover:text-amber-300 transition-colors">{{ $news->user->name }}</a>
                        @else
                            Admin
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>

    @php
        $articlePhotos = [
            'https://images.unsplash.com/photo-1509824227185-9c5a01ceba0d?auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1505842465776-3b4953ca4f44?auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1619229667009-e7e51684e8e6?auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1610614961503-7beb611d1d3f?auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1578946956088-940c3b502864?auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1665035212282-3e117d618b36?auto=format&fit=crop&w=1200&q=80',
        ];
        $coverPhoto = $articlePhotos[$news->id % count($articlePhotos)];
    @endphp

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="h-72 sm:h-[460px] rounded-2xl relative overflow-hidden">
            <img src="{{ $news->image ? asset('storage/' . $news->image) : $coverPhoto }}"
                 alt="{{ $news->title }}"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-festival-dark/40 to-transparent pointer-events-none"></div>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">

        <div class="space-y-6 text-gray-300 text-lg leading-relaxed">
            {!! nl2br(e($news->body)) !!}
        </div>

        <div class="mt-16 pt-8 border-t border-gray-800 flex items-center justify-between flex-wrap gap-4">
            <a href="{{ route('news.index') }}"
               class="text-amber-400 hover:text-amber-300 font-medium transition-colors text-sm">
                ← Back to News
            </a>
            @if ($news->category)
                <a href="{{ route('news.index', ['category' => $news->category->slug]) }}"
                   class="text-gray-500 hover:text-amber-400 text-sm transition-colors">
                    More in {{ $news->category->name }} →
                </a>
            @endif
        </div>
    </div>

@endsection
