<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminFaqCategoryController extends Controller
{
    public function index(): View
    {
        $categories = FaqCategory::withCount('faqs')->orderBy('name')->get();
        return view('admin.faq.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.faq.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:faq_categories,slug',
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);

        FaqCategory::create($data);

        return redirect()->route('admin.faq-categories.index')->with('success', 'Category created.');
    }

    public function edit(FaqCategory $faqCategory): View
    {
        return view('admin.faq.categories.edit', compact('faqCategory'));
    }

    public function update(Request $request, FaqCategory $faqCategory): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:faq_categories,slug,' . $faqCategory->id,
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);

        $faqCategory->update($data);

        return redirect()->route('admin.faq-categories.index')->with('success', 'Category updated.');
    }

    public function destroy(FaqCategory $faqCategory): RedirectResponse
    {
        $faqCategory->delete();

        return redirect()->route('admin.faq-categories.index')->with('success', 'Category deleted.');
    }
}
