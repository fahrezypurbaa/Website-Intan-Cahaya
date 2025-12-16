<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Category;
use Illuminate\Pagination\Paginator;

class LayananController extends Controller
{
    /**
     * LIST SEMUA TRAINING
     * /layanan
     * /layanan/page/{page}
     */
    public function index($page = 1)
    {
        // Inject page ke paginator
        Paginator::currentPageResolver(fn () => $page);

        $categories = Category::orderBy('name')->get();

        $trainings = Training::with('category')
            ->latest()
            ->paginate(9);

        return view('layanan.index', [
            'categories' => $categories,
            'trainings' => $trainings,
            'categorySlug' => null,
        ]);
    }

    /**
     * LIST TRAINING BY CATEGORY
     * /layanan/{category}
     * /layanan/{category}/page/{page}
     */
    public function category($categorySlug, $page = 1)
    {
        // Inject page ke paginator
        Paginator::currentPageResolver(fn () => $page);

        $categories = Category::orderBy('name')->get();

        $trainings = Training::with('category')
            ->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            })
            ->latest()
            ->paginate(9);

        return view('layanan.index', [
            'categories' => $categories,
            'trainings' => $trainings,
            'categorySlug' => $categorySlug,
        ]);
    }

    /**
     * DETAIL TRAINING
     */
    public function show($slug)
    {
        $training = Training::with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('layanan.show', compact('training'));
    }
}
