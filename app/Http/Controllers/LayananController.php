<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Training;
use Illuminate\Pagination\Paginator;

class LayananController extends Controller
{
    private function orderedCategories()
    {
        return Category::orderByRaw("
            CASE slug
                WHEN 'sertifikasi-kemnaker-ri' THEN 1
                WHEN 'sertifikasi-bnsp' THEN 2
                WHEN 'non-sertifikasi' THEN 3
                WHEN 'ppsdm-migas' THEN 4
                WHEN 'iso' THEN 5
                WHEN 'esdm' THEN 6
                WHEN 'riksa-uji' THEN 7
                WHEN 'perpanjangan-sio-lisensi' THEN 8
                ELSE 99
            END
        ")
            ->orderBy('name')
            ->get();
    }

    public function index($page = 1)
    {
        Paginator::currentPageResolver(fn () => $page);

        $categories = $this->orderedCategories();
        $keyword = request()->query('q');

        $trainings = Training::with('category')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('title', 'like', '%'.$keyword.'%');
            })
            ->latest()
            ->paginate(9)
            ->appends(['q' => $keyword]);

        return view('layanan.index', [
            'categories' => $categories,
            'trainings' => $trainings,
            'categorySlug' => null,
        ]);
    }

    public function category($categorySlug, $page = 1)
    {
        Paginator::currentPageResolver(fn () => $page);

        $categories = $this->orderedCategories();
        $keyword = request()->query('q');

        $trainings = Training::with('category')
            ->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            })
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('title', 'like', '%'.$keyword.'%');
            })
            ->latest()
            ->paginate(9)
            ->appends(['q' => $keyword]);

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
