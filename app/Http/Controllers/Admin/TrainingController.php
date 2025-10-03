<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\Category;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration'    => 'nullable|string',
            'requirement' => 'nullable|string',
            'facilities'  => 'nullable|string',
            'mode'        => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,jpg,png|max:5120', // max 5MB
        ]);

        // generate slug dari title
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
            $path = storage_path('app/public/trainings/' . $filename);

            // Pastikan folder exists
            if (!file_exists(storage_path('app/public/trainings'))) {
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

            $data['image'] = 'trainings/' . $filename;
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
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration'    => 'nullable|string',
            'requirement' => 'nullable|string',
            'facilities'  => 'nullable|string',
            'mode'        => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,jpg,png|max:5120', // max 5MB
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            
            // Hapus gambar lama jika ada
            if ($training->image && Storage::disk('public')->exists($training->image)) {
                Storage::disk('public')->delete($training->image);
            }
            
            $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
            $path = storage_path('app/public/trainings/' . $filename);

            // Pastikan folder exists
            if (!file_exists(storage_path('app/public/trainings'))) {
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

            $data['image'] = 'trainings/' . $filename;
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