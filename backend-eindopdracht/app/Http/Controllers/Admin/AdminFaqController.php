<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminFaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::with('faqCategory')->orderBy('sort_order')->paginate(20);
        return view('admin.faq.index', compact('faqs'));
    }

    public function create(): View
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faq.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'faq_category_id' => 'nullable|exists:faq_categories,id',
            'question'        => 'required|string|max:500',
            'answer'          => 'required|string',
            'sort_order'      => 'integer|min:0',
            'is_active'       => 'boolean',
        ]);

        Faq::create($data);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ item created.');
    }

    public function edit(Faq $faq): View
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faq.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $data = $request->validate([
            'faq_category_id' => 'nullable|exists:faq_categories,id',
            'question'        => 'required|string|max:500',
            'answer'          => 'required|string',
            'sort_order'      => 'integer|min:0',
            'is_active'       => 'boolean',
        ]);

        $faq->update($data);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ item updated.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ item deleted.');
    }
}
