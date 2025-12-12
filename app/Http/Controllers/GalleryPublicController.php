<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Category;

class GalleryPublicController extends Controller
{
    // === HALAMAN GALERI UTAMA (SEMUA) ===
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        $galleries = Gallery::latest()->get();
        $activeCategory = 'all';

        return view('galeri', compact('categories', 'galleries', 'activeCategory'));
    }

    // === HALAMAN GALERI BERDASARKAN KATEGORI ===
    public function category($slug)
    {
        if ($slug === 'all') {
            return redirect()->route('galeri');
        }

        $category = Category::where('slug', $slug)->firstOrFail();

        $categories = Category::orderBy('name')->get();
        $galleries = Gallery::where('category', $category->name)
                            ->latest()
                            ->get();

        $activeCategory = $slug;

        return view('galeri', compact('categories', 'galleries', 'activeCategory'));
    }
}
