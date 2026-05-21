@extends('layouts.admin')

@section('title', 'New FAQ Item')
@section('page-title', 'New FAQ Item')
@section('page-subtitle', 'Add a new frequently asked question')

@section('content')

    <form method="POST" action="{{ route('admin.faqs.store') }}" class="max-w-2xl space-y-6">
        @csrf

        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-5">

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Category</label>
                <select name="faq_category_id"
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none">
                    <option value="">— No category —</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('faq_category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Question <span class="text-red-500">*</span></label>
                <input type="text" name="question" value="{{ old('question') }}" required maxlength="500"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('question') border-red-500 @enderror">
                @error('question')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Answer <span class="text-red-500">*</span></label>
                <textarea name="answer" rows="6" required
                          class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('answer') border-red-500 @enderror">{{ old('answer') }}</textarea>
                @error('answer')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-400 text-sm font-medium mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none">
                </div>
                <div class="flex items-end pb-0.5">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                               class="rounded border-gray-700 bg-gray-800 text-amber-500 focus:ring-amber-500">
                        <span class="text-sm text-gray-300">Active (visible to public)</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                    class="bg-amber-500 hover:bg-amber-400 text-black font-semibold text-sm px-6 py-2.5 rounded-lg transition-colors">
                Create FAQ Item
            </button>
            <a href="{{ route('admin.faqs.index') }}" class="text-gray-500 hover:text-gray-300 text-sm transition-colors">
                Cancel
            </a>
        </div>
    </form>

@endsection
