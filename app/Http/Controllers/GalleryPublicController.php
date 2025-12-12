<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryPublicController extends Controller
{
    public function index()
    {
        $selectedCategory = request('category'); // ambil kategori dari URL

        // Ambil semua kategori unik
        $categories = Gallery::select('category')->distinct()->pluck('category');

        // Jika ada kategori dipilih → filter
        if ($selectedCategory && $selectedCategory !== 'all') {
            $galleries = Gallery::where('category', $selectedCategory)->latest()->get();
        } else {
            $galleries = Gallery::latest()->get();
        }

        return view('galeri', compact('categories', 'galleries', 'selectedCategory'));
    }
}
