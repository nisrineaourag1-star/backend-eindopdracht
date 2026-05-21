@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome back, ' . Auth::user()->name)

@section('content')

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

        @foreach ([
            ['label' => 'Total Users',        'key' => 'users',    'color' => 'text-blue-400 bg-blue-400/10',    'path' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
            ['label' => 'Total Articles',     'key' => 'articles', 'color' => 'text-amber-400 bg-amber-400/10',  'path' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z'],
            ['label' => 'FAQ Items',          'key' => 'faqs',     'color' => 'text-purple-400 bg-purple-400/10','path' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['label' => 'Unread Messages',    'key' => 'messages', 'color' => 'text-green-400 bg-green-400/10',  'path' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
        ] as $stat)
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex items-center gap-5">
                <div class="w-12 h-12 rounded-xl {{ $stat['color'] }} flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['path'] }}"/>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 text-xs uppercase tracking-wider font-medium">{{ $stat['label'] }}</p>
                    <p class="text-3xl font-bold text-white mt-0.5">{{ $stats[$stat['key']] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            <div class="flex items-center justify-between mb-5">
                <h2 class="text-white font-semibold text-sm uppercase tracking-wide">Recent Articles</h2>
            </div>

            @forelse ($recentNews as $article)
                <div class="flex items-center justify-between py-3 border-b border-gray-800 last:border-0">
                    <div class="min-w-0 pr-4">
                        <p class="text-gray-300 text-sm font-medium truncate">{{ $article->title }}</p>
                        <p class="text-gray-600 text-xs mt-0.5">
                            {{ $article->category->name ?? 'Uncategorized' }}
                            · {{ $article->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <span class="flex-shrink-0 text-xs px-2 py-0.5 rounded-full font-medium border
                                 {{ $article->is_published
                                    ? 'bg-green-500/10 text-green-400 border-green-500/20'
                                    : 'bg-amber-500/10 text-amber-400 border-amber-500/20' }}">
                        {{ $article->is_published ? 'Published' : 'Draft' }}
                    </span>
                </div>
            @empty
                <p class="text-gray-600 text-sm text-center py-6">No articles yet.</p>
            @endforelse
        </div>

        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            <h2 class="text-white font-semibold text-sm uppercase tracking-wide mb-5">Quick Actions</h2>

            <div class="space-y-3">
                @foreach ([
                    ['label' => 'New Article',   'desc' => 'Publish a news update',     'color' => 'text-amber-400 bg-amber-500/10 group-hover:bg-amber-500/20',  'route' => 'admin.news.create'],
                    ['label' => 'Add FAQ',        'desc' => 'Answer a common question',  'color' => 'text-purple-400 bg-purple-500/10 group-hover:bg-purple-500/20', 'route' => 'admin.faqs.create'],
                    ['label' => 'View Messages',  'desc' => 'Read contact submissions',  'color' => 'text-green-400 bg-green-500/10 group-hover:bg-green-500/20',   'route' => 'admin.messages.index'],
                    ['label' => 'Manage Users',   'desc' => 'Edit roles and accounts',   'color' => 'text-blue-400 bg-blue-500/10 group-hover:bg-blue-500/20',     'route' => 'admin.users.index'],
                ] as $action)
                    <a href="{{ route($action['route']) }}" class="group flex items-center gap-4 p-4 bg-gray-800 hover:bg-gray-700 rounded-xl transition-colors">
                        <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors {{ $action['color'] }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-white text-sm font-semibold">{{ $action['label'] }}</p>
                            <p class="text-gray-500 text-xs">{{ $action['desc'] }}</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-600 group-hover:text-gray-400 ml-auto transition-colors"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
