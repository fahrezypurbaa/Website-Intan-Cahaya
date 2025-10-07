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
            'description' => 'nullable|string',
            'duration' => 'nullable|string',
            'requirement' => 'nullable|string',
            'facilities' => 'nullable|string',
            'mode' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120', // max 5MB
        ]);

        // generate slug dari title
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $filename = time().'_'.uniqid().'.'.$img->getClientOriginalExtension();
            $path = storage_path('app/public/trainings/'.$filename);

            // Pastikan folder exists
            if (! file_exists(storage_path('app/public/trainings'))) {
                mkdir(storage_path('app/public/trainings'), 0755, true);
            }

            // Baca dan resize gambar dengan scale (v3 syntax)
            $image = Image::read($img->getRealPath());

            // Scale ke max width 1200px (mempertahankan aspect ratio)
            if ($image->width() > 1200) {
                $image->scale(width: 1200);
            }

            // Save dengan quality 85%
            $image->save($path, quality: 85);

            $data['image'] = 'trainings/'.$filename;
        }

        if ($request->hasFile('pdf')) {
            // Nama folder berdasarkan slug training
            $folder = 'brosur/'.$training->slug;

            // Simpan file dengan nama brosur.pdf
            $path = $request->file('pdf')->storeAs(
                'public/'.$folder,
                'brosur.pdf'
            );

            // Simpan path ke database (tanpa 'public/')
            $training->brochure_path = $folder.'/brosur.pdf';
            $training->save();
        }

        $training->save();

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
            'description' => 'nullable|string',
            'duration' => 'nullable|string',
            'requirement' => 'nullable|string',
            'facilities' => 'nullable|string',
            'mode' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120', // max 5MB
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $img = $request->file('image');

            // Hapus gambar lama jika ada
            if ($training->image && Storage::disk('public')->exists($training->image)) {
                Storage::disk('public')->delete($training->image);
            }

            $filename = time().'_'.uniqid().'.'.$img->getClientOriginalExtension();
            $path = storage_path('app/public/trainings/'.$filename);

            // Pastikan folder exists
            if (! file_exists(storage_path('app/public/trainings'))) {
                mkdir(storage_path('app/public/trainings'), 0755, true);
            }

            // Baca dan resize gambar dengan scale (v3 syntax)
            $image = Image::read($img->getRealPath());

            // Scale ke max width 1200px (mempertahankan aspect ratio)
            if ($image->width() > 1200) {
                $image->scale(width: 1200);
            }

            // Save dengan quality 85%
            $image->save($path, quality: 85);

            $data['image'] = 'trainings/'.$filename;
        }

        // Cek apakah ada file PDF baru diupload
        if ($request->hasFile('pdf')) {
            // Hapus file lama kalau ada
            if ($training->brochure_path && Storage::exists('public/'.$training->brochure_path)) {
                Storage::delete('public/'.$training->brochure_path);
            }

            // Buat folder berdasarkan slug training
            $folder = 'brosur/'.$training->slug;

            // Simpan file baru
            $path = $request->file('pdf')->storeAs('public/'.$folder, 'brosur.pdf');

            // Simpan path baru ke database
            $training->brochure_path = $folder.'/brosur.pdf';
            $training->save();
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

        $training->delete();

        return redirect()->route('admin.trainings.index')->with('success', 'Training berhasil dihapus');
    }
}
