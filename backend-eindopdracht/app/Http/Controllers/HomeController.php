<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $latestNews = News::published()
            ->with('category')
            ->latest()
            ->take(3)
            ->get();

        return view('pages.home', compact('latestNews'));
    }
}
