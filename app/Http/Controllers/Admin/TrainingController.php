<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\Category;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::latest()->paginate(10);
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
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:trainings,slug',
            'description' => 'nullable|string',
            'duration' => 'nullable|string',
            'requirement' => 'nullable|string', 
            'facilities' => 'nullable|string',
            'mode' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('trainings', 'public');
        }

        Training::create($data);

        return redirect()->route('admin.trainings.index')->with('success', 'Training berhasil ditambahkan');
    }

    public function edit(Training $training)
    {
        $categories = Category::all();
        return view('admin.trainings.edit', compact('training', 'categories'));
    }

    public function update(Request $request, Training $training)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:trainings,slug,' . $training->id,
            'description' => 'nullable|string',
            'duration' => 'nullable|string',
            'requirement' => 'nullable|string',
            'facilities' => 'nullable|string',
            'mode' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('trainings', 'public');
        }

        $training->update($data);

        return redirect()->route('admin.trainings.index')->with('success', 'Training berhasil diperbarui');
    }

    public function show(Training $training)
    {
        return view('admin.trainings.show', compact('training'));
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return redirect()->route('admin.trainings.index')->with('success', 'Training berhasil dihapus');
    }
}
