@extends('layouts.app')

@section('title', $user->name . '\'s Profile')

@section('content')

    <div class="relative h-72 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1501386761578-eac5c94b800a?auto=format&fit=crop&w=1920&q=80"
             alt="Festival crowd"
             class="w-full h-full object-cover object-center">
        <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-black/40 to-festival-dark"></div>
    </div>

    <div class="pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">

            <div class="relative -mt-20 mb-10">
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 flex flex-col sm:flex-row items-center sm:items-start gap-6">

                    <div class="relative flex-shrink-0 -mt-20 sm:-mt-20">
                        <img src="{{ $user->avatarUrl() }}"
                             alt="{{ $user->name }}"
                             class="w-24 h-24 rounded-full border-4 border-gray-900 object-cover ring-2 ring-amber-500/40">
                    </div>

                    <div class="text-center sm:text-left flex-1 pt-0 sm:pt-2">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-2 mb-1">
                            <h1 class="text-2xl font-extrabold text-white">{{ $user->name }}</h1>
                            @if ($user->is_admin)
                                <span class="inline-block bg-amber-500 text-black text-xs font-bold uppercase tracking-wider px-2.5 py-0.5 rounded">
                                    Admin
                                </span>
                            @endif
                        </div>

                        @if ($user->username)
                            <p class="text-gray-500 text-sm mb-3">@{{ $user->username }}</p>
                        @endif

                        @if ($user->bio)
                            <p class="text-gray-400 text-sm leading-relaxed max-w-lg">{{ $user->bio }}</p>
                        @endif

                        <div class="flex flex-wrap items-center gap-4 mt-3">
                            <p class="text-gray-600 text-xs">Member since {{ $user->created_at->format('F Y') }}</p>
                            @if ($user->birthday)
                                <p class="text-gray-600 text-xs">Born {{ $user->birthday->format('d M Y') }}</p>
                            @endif
                        </div>
                    </div>

                    @auth
                        @if (Auth::id() === $user->id)
                            <a href="{{ route('profile.edit') }}"
                               class="flex-shrink-0 border border-gray-700 hover:border-amber-500/50 text-gray-400
                                      hover:text-amber-400 text-xs font-medium uppercase tracking-wider px-4 py-2
                                      rounded-full transition-all self-start">
                                Edit Profile
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <div>
                <h2 class="text-white font-bold text-xl mb-6">Articles by {{ $user->name }}</h2>

                @php
                    $profilePhotos = [
                        'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?auto=format&fit=crop&w=700&q=80',
                        'https://images.unsplash.com/photo-1429962714451-bb934ecdc4ec?auto=format&fit=crop&w=700&q=80',
                        'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?auto=format&fit=crop&w=700&q=80',
                        'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?auto=format&fit=crop&w=700&q=80',
                    ];
                @endphp

                @if ($userNews->isEmpty())
                    <div class="text-center py-16 bg-gray-900 border border-gray-800 rounded-2xl">
                        <p class="text-gray-500 text-sm">No published articles yet.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach ($userNews as $index => $article)
                            <article class="group bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden
                                            hover:border-amber-500/30 transition-all duration-300
                                            hover:-translate-y-1 hover:shadow-xl hover:shadow-amber-500/5">

                                <a href="{{ route('news.show', $article) }}" class="block h-44 relative overflow-hidden">
                                    <img src="{{ $article->image ? asset('storage/' . $article->image) : $profilePhotos[$index % count($profilePhotos)] }}"
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

                                <div class="p-5">
                                    <p class="text-gray-600 text-xs mb-1">{{ $article->created_at->format('F j, Y') }}</p>
                                    <h3 class="text-white font-bold text-base leading-tight mb-2
                                               group-hover:text-amber-400 transition-colors">
                                        {{ $article->title }}
                                    </h3>
                                    <p class="text-gray-500 text-sm line-clamp-2">{{ $article->excerpt }}</p>
                                    <a href="{{ route('news.show', $article) }}"
                                       class="mt-4 inline-block text-amber-400 hover:text-amber-300 text-sm font-medium transition-colors">
                                        Read more →
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>

@endsection
