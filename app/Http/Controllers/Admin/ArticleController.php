<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Tampilkan daftar artikel
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10); // ambil artikel dari DB
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Form tambah artikel
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Simpan artikel baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $article = new Article();
        $article->title = $validated['title'];
        $article->slug = Str::slug($validated['title']); // slug auto dari judul
        $article->excerpt = $validated['excerpt'] ?? Str::limit(strip_tags($validated['content']), 150);
        $article->content = $validated['content'];

        // upload thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('articles', 'public');
            $article->thumbnail = $path;
        }

        $article->save();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Form edit artikel
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update artikel
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $article->title = $validated['title'];
        $article->slug = Str::slug($validated['title']); // update slug juga
        $article->excerpt = $validated['excerpt'] ?? Str::limit(strip_tags($validated['content']), 150);
        $article->content = $validated['content'];

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('articles', 'public');
            $article->thumbnail = $path;
        }

        $article->save();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Hapus artikel
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
