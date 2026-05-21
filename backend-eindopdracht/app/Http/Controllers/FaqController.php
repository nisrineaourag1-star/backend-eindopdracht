<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqCategories = FaqCategory::with(['activeFaqs'])->orderBy('name')->get();

        return view('pages.faq', compact('faqCategories'));
    }
}
