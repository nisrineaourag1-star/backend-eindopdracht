<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\News;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'users'    => User::count(),
            'articles' => News::count(),
            'faqs'     => Faq::count(),
            'messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentNews = News::with('user', 'category')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentNews'));
    }
}
