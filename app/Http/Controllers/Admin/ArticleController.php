<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Tampilkan daftar artikel
     */
    public function index()
    {
        $articles = Article::latest()->get();

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
            'author_name' => 'nullable|string|max:100',
            'author_bio' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        /** ===============================
         * PARAGRAPH FORMAT FIX (INTI)
         * =============================== */
        $content = trim($validated['content']);

        // escape dulu biar aman
        $content = e($content);

        // double enter = paragraf baru
        $content = '<p>'.preg_replace("/\n\s*\n/", '</p><p>', $content).'</p>';

        // single enter = line break
        $content = str_replace("\n", '<br>', $content);

        $validated['content'] = $content;
        /** =============================== */
        $article = new Article($validated);
        $article->slug = Str::slug($validated['title']);
        $article->views = 0;

        if (empty($validated['excerpt'])) {
            $article->excerpt = Str::limit(strip_tags($content), 150);
        }

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('articles', 'public');
            $article->thumbnail = $path;
        }

        $article->save();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
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
            'author_name' => 'nullable|string|max:100',
            'author_bio' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        /** ===============================
         * PARAGRAPH FORMAT FIX (INTI)
         * =============================== */
        $content = trim($validated['content']);
        $content = e($content);
        $content = '<p>'.preg_replace("/\n\s*\n/", '</p><p>', $content).'</p>';
        $content = str_replace("\n", '<br>', $content);

        $validated['content'] = $content;
        /** =============================== */
        $article->fill($validated);
        $article->slug = Str::slug($validated['title']);

        if (empty($validated['excerpt'])) {
            $article->excerpt = Str::limit(strip_tags($content), 150);
        }

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('articles', 'public');
            $article->thumbnail = $path;
        }

        $article->save();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui.');
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
