<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    // tampilkan form tambah
    public function create()
    {
        return view('admin.galleries.create');
    }

    // simpan dari form
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $path = $request->file('image')->store('galleries', 'public');
Gallery::create([
    'title' => $request->title,
    'category' => $request->category,
    'image' => $path,
]);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->only(['title', 'category']);

        if ($request->hasFile('image')) {
            // hapus file lama jika ada
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            $data['image'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        // hapus file fisik
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
