<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryPublicController extends Controller
{
    public function index()
    {
        // ambil semua kategori unik
        $categories = Gallery::select('category')->distinct()->pluck('category');

        // ambil semua data gallery
        $galleries = Gallery::latest()->get();

        return view('galeri', compact('categories', 'galleries'));
    }
}

