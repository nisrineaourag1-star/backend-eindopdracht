@extends('layouts.admin')

@section('title', 'News Articles')
@section('page-title', 'News Articles')
@section('page-subtitle', 'Manage all published and draft articles')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <p class="text-gray-500 text-sm">{{ $news->total() }} article(s) total</p>
        <a href="{{ route('admin.news.create') }}"
           class="bg-amber-500 hover:bg-amber-400 text-black font-semibold text-sm px-4 py-2 rounded-lg transition-colors">
            + New Article
        </a>
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-800 text-gray-500 text-xs uppercase tracking-wider">
                    <th class="text-left px-6 py-3">Title</th>
                    <th class="text-left px-6 py-3">Category</th>
                    <th class="text-left px-6 py-3">Author</th>
                    <th class="text-left px-6 py-3">Status</th>
                    <th class="text-left px-6 py-3">Date</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($news as $article)
                    <tr class="border-b border-gray-800 last:border-0 hover:bg-gray-800/50">
                        <td class="px-6 py-4">
                            <p class="text-white font-medium truncate max-w-xs">{{ $article->title }}</p>
                            <p class="text-gray-600 text-xs mt-0.5 truncate max-w-xs">{{ $article->excerpt }}</p>
                        </td>
                        <td class="px-6 py-4 text-gray-400">{{ $article->category->name ?? '—' }}</td>
                        <td class="px-6 py-4 text-gray-400">{{ $article->user->name ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <span class="text-xs px-2 py-0.5 rounded-full font-medium border
                                {{ $article->is_published
                                   ? 'bg-green-500/10 text-green-400 border-green-500/20'
                                   : 'bg-amber-500/10 text-amber-400 border-amber-500/20' }}">
                                {{ $article->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-xs whitespace-nowrap">
                            {{ $article->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3 justify-end">
                                <a href="{{ route('admin.news.edit', $article) }}"
                                   class="text-amber-400 hover:text-amber-300 text-xs font-medium transition-colors">Edit</a>
                                <form method="POST" action="{{ route('admin.news.destroy', $article) }}"
                                      onsubmit="return confirm('Delete this article?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="text-red-500 hover:text-red-400 text-xs font-medium transition-colors">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-600">No articles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($news->hasPages())
        <div class="mt-6">{{ $news->links() }}</div>
    @endif

@endsection
