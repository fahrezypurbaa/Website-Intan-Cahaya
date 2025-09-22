<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::with('category')->latest()->paginate(10);

        return view('admin.trainings.index', compact('trainings'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.trainings.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'duration' => 'nullable|string',
            'requirement' => 'nullable|string',
            'mode' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('trainings', 'public');
        }

        Training::create($data);

        return redirect()->route('admin.trainings.index')
            ->with('success', 'Training berhasil ditambahkan');
    }

    public function edit(Training $training)
    {
        $categories = Category::all();

        return view('admin.trainings.edit', compact('training', 'categories'));
    }

    public function update(Request $request, Training $training)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'duration' => 'nullable|string',
            'requirement' => 'nullable|string',
            'mode' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('trainings', 'public');
        }

        $training->update($data);

        return redirect()->route('admin.trainings.index')
            ->with('success', 'Training berhasil diperbarui');
    }

    public function destroy(Training $training)
    {
        $training->delete();

        return redirect()->route('admin.trainings.index')
            ->with('success', 'Training berhasil dihapus');
    }
}
