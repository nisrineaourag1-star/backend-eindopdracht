@extends('layouts.admin')

@section('title', 'FAQ Categories')
@section('page-title', 'FAQ Categories')
@section('page-subtitle', 'Manage FAQ category groups')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('admin.faqs.index') }}" class="text-gray-500 hover:text-gray-300 text-sm transition-colors">
            ← Back to FAQ Items
        </a>
        <a href="{{ route('admin.faq-categories.create') }}"
           class="bg-amber-500 hover:bg-amber-400 text-black font-semibold text-sm px-4 py-2 rounded-lg transition-colors">
            + New Category
        </a>
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-800 text-gray-500 text-xs uppercase tracking-wider">
                    <th class="text-left px-6 py-3">Name</th>
                    <th class="text-left px-6 py-3">Slug</th>
                    <th class="text-left px-6 py-3">FAQ Items</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="border-b border-gray-800 last:border-0 hover:bg-gray-800/50">
                        <td class="px-6 py-4 text-white font-medium">{{ $category->name }}</td>
                        <td class="px-6 py-4 text-gray-500 font-mono text-xs">{{ $category->slug }}</td>
                        <td class="px-6 py-4 text-gray-400">{{ $category->faqs_count }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3 justify-end">
                                <a href="{{ route('admin.faq-categories.edit', $category) }}"
                                   class="text-amber-400 hover:text-amber-300 text-xs font-medium transition-colors">Edit</a>
                                <form method="POST" action="{{ route('admin.faq-categories.destroy', $category) }}"
                                      onsubmit="return confirm('Delete this category? FAQ items will lose their category.')">
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
                        <td colspan="4" class="px-6 py-12 text-center text-gray-600">No categories yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
