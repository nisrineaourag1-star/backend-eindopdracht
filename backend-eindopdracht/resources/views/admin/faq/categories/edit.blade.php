@extends('layouts.admin')

@section('title', 'Edit FAQ Category')
@section('page-title', 'Edit FAQ Category')
@section('page-subtitle', $faqCategory->name)

@section('content')

    <form method="POST" action="{{ route('admin.faq-categories.update', $faqCategory) }}" class="max-w-lg space-y-6">
        @csrf @method('PATCH')

        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-5">

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $faqCategory->name) }}" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('name') border-red-500 @enderror">
                @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $faqCategory->slug) }}"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none font-mono @error('slug') border-red-500 @enderror">
                @error('slug')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                    class="bg-amber-500 hover:bg-amber-400 text-black font-semibold text-sm px-6 py-2.5 rounded-lg transition-colors">
                Save Changes
            </button>
            <a href="{{ route('admin.faq-categories.index') }}" class="text-gray-500 hover:text-gray-300 text-sm transition-colors">
                Cancel
            </a>
        </div>
    </form>

@endsection
