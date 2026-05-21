@extends('layouts.admin')

@section('title', 'Edit Article')
@section('page-title', 'Edit Article')
@section('page-subtitle', $news->title)

@section('content')

    <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data"
          class="max-w-3xl space-y-6">
        @csrf @method('PATCH')

        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-5">

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $news->title) }}" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('title') border-red-500 @enderror">
                @error('title')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $news->slug) }}"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none font-mono @error('slug') border-red-500 @enderror">
                @error('slug')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Category</label>
                <select name="category_id"
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none">
                    <option value="">— No category —</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ old('category_id', $news->category_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Excerpt <span class="text-red-500">*</span></label>
                <textarea name="excerpt" rows="2" required maxlength="500"
                          class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none resize-none @error('excerpt') border-red-500 @enderror">{{ old('excerpt', $news->excerpt) }}</textarea>
                @error('excerpt')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Body <span class="text-red-500">*</span></label>
                <textarea name="body" rows="12" required
                          class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('body') border-red-500 @enderror">{{ old('body', $news->body) }}</textarea>
                @error('body')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Cover Image</label>
                @if ($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" alt=""
                         class="w-48 h-28 object-cover rounded-lg mb-3 border border-gray-700">
                @endif
                <input type="file" name="image" accept="image/*"
                       class="block text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-amber-500/10 file:text-amber-400 hover:file:bg-amber-500/20 cursor-pointer">
                @error('image')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" name="is_published" value="1"
                           {{ old('is_published', $news->is_published) ? 'checked' : '' }}
                           class="rounded border-gray-700 bg-gray-800 text-amber-500 focus:ring-amber-500">
                    <span class="text-sm text-gray-300">Published</span>
                </label>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                    class="bg-amber-500 hover:bg-amber-400 text-black font-semibold text-sm px-6 py-2.5 rounded-lg transition-colors">
                Save Changes
            </button>
            <a href="{{ route('admin.news.index') }}" class="text-gray-500 hover:text-gray-300 text-sm transition-colors">
                Cancel
            </a>
        </div>
    </form>

@endsection
