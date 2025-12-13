<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FaqController extends Controller
{
    public function index(): View
    {
        $categories = FaqCategory::with('faqItems')->get();

        return view('faq.index', compact('categories'));
    }

    public function create(): View
    {
        $categories = FaqCategory::all();

        return view('faq.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'question'        => ['required', 'string', 'max:255'],
            'answer'          => ['required', 'string'],
        ]);

        FaqItem::query()->create($validated);

        return redirect()->route('faq.index')
            ->with('success', 'FAQ toegevoegd.');
    }

    public function edit(FaqItem $faq): View
    {
        $categories = FaqCategory::all();

        return view('faq.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, FaqItem $faq): RedirectResponse
    {
        $validated = $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'question'        => ['required', 'string', 'max:255'],
            'answer'          => ['required', 'string'],
        ]);

        $faq->update($validated);

        return redirect()->route('faq.index')
            ->with('success', 'FAQ aangepast.');
    }

    public function destroy(FaqItem $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('faq.index')
            ->with('success', 'FAQ verwijderd.');
    }
}
