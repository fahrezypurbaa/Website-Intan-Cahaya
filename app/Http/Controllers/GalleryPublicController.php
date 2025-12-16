<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;

class GalleryPublicController extends Controller
{
    /**
     * Ambil kategori dengan urutan prioritas
     */
    private function getOrderedCategories()
    {
        $priorityOrder = [
            'ppsdm-migas',
            'non-sertifikasi',
            'sertifikasi-bnsp',
            'sertifikasi-kemnaker-ri',
        ];

        return Category::orderByRaw(
            "FIELD(slug, '".implode("','", $priorityOrder)."') DESC"
        )
            ->orderBy('name') // sisanya tetap rapi alfabet
            ->get();
    }

    // === HALAMAN GALERI UTAMA (SEMUA) ===
    public function index()
    {
        $categories = $this->getOrderedCategories();
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

        $categories = $this->getOrderedCategories();

        $galleries = Gallery::where('category', $category->name)
            ->latest()
            ->get();

        $activeCategory = $slug;

        return view('galeri', compact('categories', 'galleries', 'activeCategory'));
    }
}
