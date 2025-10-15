<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $query = Training::with('category');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $trainings = $query->latest()->paginate(10);
        $categories = Category::orderBy('name')->get();

        return view('admin.trainings.index', compact('trainings', 'categories'));
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
            'description' => 'nullable|string',
            'duration' => 'nullable|string',
            'requirement' => 'nullable|string',
            'facilities' => 'nullable|string',
            'mode' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        // Buat slug dari title
        $data['slug'] = Str::slug($request->title);

        // Simpan data awal
        $training = Training::create($data);

        // ===== Simpan gambar (jika ada) =====
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $filename = time().'_'.uniqid().'.'.$img->getClientOriginalExtension();
            $path = storage_path('app/public/trainings/'.$filename);

            if (! file_exists(dirname($path))) {
                mkdir(dirname($path), 0755, true);
            }

            $image = Image::read($img->getRealPath());
            if ($image->width() > 1200) {
                $image->scale(width: 1200);
            }
            $image->save($path, quality: 85);

            $training->update(['image' => 'trainings/'.$filename]);
        }

        // ===== Simpan file PDF brosur (jika ada) =====
        if ($request->hasFile('pdf')) {
            $folder = 'brosur/'.$training->slug;
            $request->file('pdf')->storeAs('public/'.$folder, 'brosur.pdf');
            $training->update(['brochure_path' => $folder.'/brosur.pdf']);
        }

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
            'description' => 'nullable|string',
            'duration' => 'nullable|string',
            'requirement' => 'nullable|string',
            'facilities' => 'nullable|string',
            'mode' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        $data['slug'] = Str::slug($request->title);

        // ===== Update gambar =====
        if ($request->hasFile('image')) {
            $img = $request->file('image');

            // Hapus gambar lama jika ada
            if ($training->image && Storage::disk('public')->exists($training->image)) {
                Storage::disk('public')->delete($training->image);
            }

            $filename = time().'_'.uniqid().'.'.$img->getClientOriginalExtension();
            $path = storage_path('app/public/trainings/'.$filename);

            if (! file_exists(dirname($path))) {
                mkdir(dirname($path), 0755, true);
            }

            $image = Image::read($img->getRealPath());
            if ($image->width() > 1200) {
                $image->scale(width: 1200);
            }
            $image->save($path, quality: 85);

            $data['image'] = 'trainings/'.$filename;
        }

        // ===== Update PDF brosur (jika ada) =====
        if ($request->hasFile('pdf')) {
            // Hapus file lama jika ada
            if ($training->brochure_path && Storage::disk('public')->exists($training->brochure_path)) {
                Storage::disk('public')->delete($training->brochure_path);
            }

            $folder = 'brosur/'.$training->slug;
            $request->file('pdf')->storeAs('public/'.$folder, 'brosur.pdf');
            $data['brochure_path'] = $folder.'/brosur.pdf';
        }

        $training->update($data);

        return redirect()->route('admin.trainings.index')->with('success', 'Training berhasil diperbarui');
    }

    public function destroy(Training $training)
    {
        // Hapus gambar jika ada
        if ($training->image && Storage::disk('public')->exists($training->image)) {
            Storage::disk('public')->delete($training->image);
        }

        // Hapus brosur jika ada
        if ($training->brochure_path && Storage::disk('public')->exists($training->brochure_path)) {
            Storage::disk('public')->delete($training->brochure_path);
        }

        $training->delete();

        return redirect()->route('admin.trainings.index')->with('success', 'Training berhasil dihapus');
    }

    // ===== Tambahan: download brosur PDF =====
    public function downloadBrochure(Training $training)
    {
        if (! $training->brochure_path || ! Storage::disk('public')->exists($training->brochure_path)) {
            abort(404, 'Brosur tidak ditemukan');
        }

        $path = Storage::disk('public')->path($training->brochure_path);

        return response()->download($path, basename($path), [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="'.basename($path).'"',
        ]);
    }
}
