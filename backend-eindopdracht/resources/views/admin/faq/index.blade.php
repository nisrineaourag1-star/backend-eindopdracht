@extends('layouts.admin')

@section('title', 'FAQ Items')
@section('page-title', 'FAQ Items')
@section('page-subtitle', 'Manage frequently asked questions')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <p class="text-gray-500 text-sm">{{ $faqs->total() }} item(s)</p>
            <a href="{{ route('admin.faq-categories.index') }}"
               class="text-amber-400 hover:text-amber-300 text-sm transition-colors">
                Manage Categories →
            </a>
        </div>
        <a href="{{ route('admin.faqs.create') }}"
           class="bg-amber-500 hover:bg-amber-400 text-black font-semibold text-sm px-4 py-2 rounded-lg transition-colors">
            + New FAQ
        </a>
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-800 text-gray-500 text-xs uppercase tracking-wider">
                    <th class="text-left px-6 py-3">Question</th>
                    <th class="text-left px-6 py-3">Category</th>
                    <th class="text-left px-6 py-3">Order</th>
                    <th class="text-left px-6 py-3">Status</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($faqs as $faq)
                    <tr class="border-b border-gray-800 last:border-0 hover:bg-gray-800/50">
                        <td class="px-6 py-4">
                            <p class="text-white font-medium truncate max-w-sm">{{ $faq->question }}</p>
                        </td>
                        <td class="px-6 py-4 text-gray-400">{{ $faq->faqCategory->name ?? '—' }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $faq->sort_order }}</td>
                        <td class="px-6 py-4">
                            <span class="text-xs px-2 py-0.5 rounded-full font-medium border
                                {{ $faq->is_active
                                   ? 'bg-green-500/10 text-green-400 border-green-500/20'
                                   : 'bg-gray-600/20 text-gray-500 border-gray-600/30' }}">
                                {{ $faq->is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3 justify-end">
                                <a href="{{ route('admin.faqs.edit', $faq) }}"
                                   class="text-amber-400 hover:text-amber-300 text-xs font-medium transition-colors">Edit</a>
                                <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}"
                                      onsubmit="return confirm('Delete this FAQ item?')">
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
                        <td colspan="5" class="px-6 py-12 text-center text-gray-600">No FAQ items yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($faqs->hasPages())
        <div class="mt-6">{{ $faqs->links() }}</div>
    @endif

@endsection
