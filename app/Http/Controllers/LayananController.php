<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Category;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        // Ambil pelatihan berdasarkan kategori (jika ada)
        $trainings = Training::with('category')
            ->when($request->category, function ($query) use ($request) {
                $query->whereHas('category', function ($subQuery) use ($request) {
                    $subQuery->where('slug', $request->category);
                });
            })
            ->latest()
            ->paginate(9);

        return view('layanan.index', compact('categories', 'trainings'));
    }

    public function show($slug)
    {
        $training = Training::where('slug', $slug)
            ->with('category')
            ->firstOrFail();

        return view('layanan.show', compact('training'));
    }
}
