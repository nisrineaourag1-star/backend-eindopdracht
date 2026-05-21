<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminNewsController extends Controller
{
    public function index(): View
    {
        $news = News::with('user', 'category')->latest()->paginate(15);
        return view('admin.news.index', compact('news'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'nullable|string|max:255|unique:news,slug',
            'excerpt'      => 'required|string|max:500',
            'body'         => 'required|string',
            'category_id'  => 'nullable|exists:categories,id',
            'image'        => 'nullable|image|max:2048',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $data['slug']    = $data['slug'] ?: Str::slug($data['title']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        if (!empty($data['is_published']) && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Article created.');
    }

    public function edit(News $news): View
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'nullable|string|max:255|unique:news,slug,' . $news->id,
            'excerpt'      => 'required|string|max:500',
            'body'         => 'required|string',
            'category_id'  => 'nullable|exists:categories,id',
            'image'        => 'nullable|image|max:2048',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        if (!empty($data['is_published']) && empty($news->published_at) && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Article updated.');
    }

    public function destroy(News $news): RedirectResponse
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Article deleted.');
    }
}
