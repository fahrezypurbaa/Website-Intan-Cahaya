<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingMaterial;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingMaterialController extends Controller
{
    public function index()
    {
        $materials = TrainingMaterial::with('training')->orderBy('group_name')->get();
        return view('admin.materials.index', compact('materials'));
    }

    public function create()
    {
        $trainings = Training::all();
        $groups = [
            'Kelompok Dasar',
            'Kelompok Inti',
            'Kelompok Penunjang',
            'Praktek Pemeriksaan',
            'Evaluasi'
        ];
        return view('admin.materials.create', compact('trainings', 'groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'group_name'  => 'required|string',
            'title'       => 'required|string|max:255',
            'jp'          => 'required|integer|min:1',
        ]);

        TrainingMaterial::create($request->all());

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil ditambahkan');
    }

    public function edit(TrainingMaterial $material)
    {
        $trainings = Training::all();
        $groups = [
            'Kelompok Dasar',
            'Kelompok Inti',
            'Kelompok Penunjang',
            'Praktek Pemeriksaan',
            'Evaluasi'
        ];
        return view('admin.materials.edit', compact('material', 'trainings', 'groups'));
    }

    public function update(Request $request, TrainingMaterial $material)
    {
        $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'group_name'  => 'required|string',
            'title'       => 'required|string|max:255',
            'jp'          => 'required|integer|min:1',
        ]);

        $material->update($request->all());

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil diperbarui');
    }

    public function destroy(TrainingMaterial $material)
    {
        $material->delete();
        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil dihapus');
    }
}
