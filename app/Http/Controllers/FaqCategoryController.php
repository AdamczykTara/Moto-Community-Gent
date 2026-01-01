<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FaqCategoryController extends Controller
{
    public function create(): View
    {
        return view('faq.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        FaqCategory::query()->create($request->only('name'));

        return redirect()->route('faq.index')
            ->with('success', 'Categorie toegevoegd.');
    }

    public function edit(FaqCategory $category): View
    {
        return view('faq.categories.edit', compact('category'));
    }

    public function update(Request $request, FaqCategory $category): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $category->update($request->only('name'));

        return redirect()->route('faq.index')
            ->with('success', 'Categorie aangepast.');
    }

    public function destroy(FaqCategory $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('faq.index')
            ->with('success', 'Categorie verwijderd.');
    }
}
