<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $query = News::published()
            ->with('user', 'category')
            ->latest();

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $news            = $query->paginate(9)->withQueryString();
        $categories      = Category::all();
        $currentCategory = $request->category;

        return view('pages.news.index', compact('news', 'categories', 'currentCategory'));
    }

    public function show(News $news): View
    {
        if (! $news->is_published) {
            abort(404);
        }

        return view('pages.news.show', compact('news'));
    }
}
