<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TrainingMaterial;
use Illuminate\Http\Request;

class TrainingMaterialController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $materials = TrainingMaterial::with('training.category')
            ->when($search, function ($query, $search) {
                $query->whereHas('training', function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                });
            })
            ->orderBy('group_name')
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('admin.materials.index', compact('materials', 'search'));
    }

    public function create()
    {
        $trainings = Training::with('category')->get();

        $groups = [
            'Kelompok Dasar',
            'Kelompok Inti',
            'Kelompok Penunjang',
            'Praktek Pemeriksaan',
            'Evaluasi',
        ];

        return view('admin.materials.create', compact('trainings', 'groups'));
    }

    public function store(Request $request)
    {
        $training = Training::with('category')->findOrFail($request->training_id);
        $category = $training->category ? $training->category->name : null;

        $rules = [
            'training_id' => 'required|exists:trainings,id',
            'materials' => 'required|array|min:1',
        ];

        // Kemnaker
        if ($category === 'Kemnaker RI') {

            $rules['group_name'] = 'required|string';
            $rules['materials.*.title'] = 'required|string|max:255';
            $rules['materials.*.jp'] = 'nullable|numeric|min:0';

        }
        // Non Sertifikasi
        elseif ($category === 'Non Sertifikasi') {

            $rules['materials.*.title'] = 'required|string|max:255';

        }
        // BNSP / lainnya
        else {

            $rules['materials.*.kode_unit'] = 'nullable|string|max:255';
            $rules['materials.*.title'] = 'required|string|max:255';

        }

        $validated = $request->validate($rules);

        foreach ($validated['materials'] as $material) {
            TrainingMaterial::create([
                'training_id' => $validated['training_id'],
                'group_name'  => $validated['group_name'] ?? null,
                'kode_unit'   => $material['kode_unit'] ?? null,
                'title'       => $material['title'],
                'jp'          => $material['jp'] ?? null,
            ]);
        }

        return redirect()
            ->route('admin.materials.index')
            ->with('success', "✅ Semua materi berhasil ditambahkan untuk kategori {$category}");
    }

    public function edit(TrainingMaterial $material)
    {
        $trainings = Training::with('category')->get();
        $groups = [
            'Kelompok Dasar',
            'Kelompok Inti',
            'Kelompok Penunjang',
            'Praktek Pemeriksaan',
            'Evaluasi',
        ];

        return view('admin.materials.edit', compact('material', 'trainings', 'groups'));
    }

    public function update(Request $request, TrainingMaterial $material)
    {
        $training = Training::with('category')->findOrFail($request->training_id);
        $category = $training->category ? $training->category->name : null;

        $rules = [
            'training_id' => 'required|exists:trainings,id',
            'title' => 'required|string|max:255',
        ];

        if ($category === 'Kemnaker RI') {
            $rules['group_name'] = 'required|string';
            $rules['jp'] = 'nullable|numeric|min:0';
        } 
        elseif ($category === 'Non Sertifikasi') {
            // hanya judul, tidak perlu kode_unit dan jp
        }
        else {
            $rules['kode_unit'] = 'nullable|string|max:255';
        }

        $validated = $request->validate($rules);

        $material->update([
            'training_id' => $validated['training_id'],
            'group_name'  => $validated['group_name'] ?? null,
            'kode_unit'   => $validated['kode_unit'] ?? null,
            'title'       => $validated['title'],
            'jp'          => $validated['jp'] ?? null,
        ]);

        return redirect()->route('admin.materials.index')
            ->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(TrainingMaterial $material)
    {
        $material->delete();

        return redirect()->route('admin.materials.index')
            ->with('success', 'Materi berhasil dihapus.');
    }
}
