<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::with('user')
            ->orderByDesc('published_at')
            ->paginate(10);

        return view('news.index', compact('news'));
    }

    public function create(): View
    {
        return view('news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'image'   => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('news_images', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['published_at'] = now();

        News::query()->create($validated);

        return redirect()->route('news.index')
            ->with('success', 'Nieuwsitem aangemaakt.');
    }

    public function show(News $news): View
    {
        $news->load(['user', 'comments.user']);

        return view('news.show', compact('news'));
    }

    public function edit(News $news): View
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $validated = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'image'   => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $validated['image'] = $request->file('image')
                ->store('news_images', 'public');
        }

        $news->update($validated);

        return redirect()->route('news.show', $news)
            ->with('success', 'Nieuwsitem bijgewerkt.');
    }

    public function destroy(News $news): RedirectResponse
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')
            ->with('success', 'Nieuwsitem verwijderd.');
    }

    public function storeComment(Request $request, News $news): RedirectResponse
    {
        $request->validate([
            'comment_text' => ['required', 'string', 'max:1000'],
        ]);

        Comment::query()->create([
            'news_id' => $news->id,
            'user_id' => Auth::id(),
            'comment_text' => $request->comment_text,
        ]);

        return back();
    }

    public function destroyComment(Comment $comment): RedirectResponse
    {
        if (!Auth::user()->isAdmin() && Auth::id() !== $comment->user_id) {
            abort(403);
        }

        $comment->delete();

        return back()->with('success', 'Comment verwijderd.');
    }
}
