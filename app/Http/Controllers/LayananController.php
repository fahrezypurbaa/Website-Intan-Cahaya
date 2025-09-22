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

        $trainings = Training::with('category')
            ->when($request->category, function($q) use ($request) {
                $q->whereHas('category', fn($qq) => $qq->where('slug',$request->category));
            })
            ->paginate(9);

        return view('layanan.index', compact('categories','trainings'));
    }

    public function show($slug)
    {
        $training = Training::where('slug',$slug)->with('category')->firstOrFail();
        return view('layanan.show', compact('training'));
    }
}

