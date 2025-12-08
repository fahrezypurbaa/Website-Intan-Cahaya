<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Category;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request, $categorySlug = null, $page = null)
{
    $categories = Category::all();

    // Jika menggunakan SEO pagination: /layanan/{category}/page/{page}
    if ($page) {
        $request->merge(['page' => $page]);
    }

    // Query training
    $trainings = Training::with('category')
        ->when($categorySlug, function ($query) use ($categorySlug) {
            $query->whereHas('category', function ($subQuery) use ($categorySlug) {
                $subQuery->where('slug', $categorySlug);
            });
        })
        ->oldest()
        ->paginate(9);

    return view('layanan.index', compact('categories', 'trainings', 'categorySlug'));
}

    public function show($slug)
    {
        $training = Training::where('slug', $slug)
            ->with('category')
            ->firstOrFail();

        return view('layanan.show', compact('training'));
    }
}
