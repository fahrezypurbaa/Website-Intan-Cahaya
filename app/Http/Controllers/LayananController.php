<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class LayananController extends Controller
{
    public function index(Request $request, $categorySlug = null, $page = 1)
    {
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $categories = Category::orderBy('name')->get();

        $trainings = Training::with('category')
            ->when($categorySlug, function ($query) use ($categorySlug) {
                $query->whereHas('category', function ($subQuery) use ($categorySlug) {
                    $subQuery->where('slug', $categorySlug);
                });
            })
            ->latest()
            ->paginate(9);

        return view('layanan.index', [
            'categories' => $categories,
            'trainings' => $trainings,
            'categorySlug' => $categorySlug,
        ]);
    }

    public function show($slug)
    {
        $training = Training::with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('layanan.show', compact('training'));
    }
}
