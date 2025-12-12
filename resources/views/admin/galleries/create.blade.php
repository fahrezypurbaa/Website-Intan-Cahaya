@extends('layouts.admin')

@section('title', 'Tambah Foto Gallery')

@section('content')
    <x-admin.form-wrapper title="🖼️ Tambah Foto Gallery" action="{{ route('admin.galleries.store') }}" method="POST"
        enctype="multipart/form-data" submit="Simpan Foto Berhasil !" back="{{ route('admin.galleries.index') }}">
        {{-- Judul --}}
        <div>
            <label class="block text-sm font-medium mb-1">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}"
                class="w-full border rounded-lg p-2.5 focus:ring focus:ring-green-200 focus:border-green-400"
                placeholder="Masukkan judul foto">
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block text-sm font-medium mb-1">Kategori</label>
            <select name="category" class="form-control" required>
                <option value="">-- Pilih kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Upload Gambar --}}
        <div>
            <label class="block text-sm font-medium mb-1">Upload Gambar</label>
            <input type="file" name="image" accept="image/*"
                class="w-full text-sm border rounded-lg file:mr-4 file:py-2 file:px-4
                          file:rounded-lg file:border-0 file:text-sm file:font-semibold
                          file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <p class="mt-1 text-xs text-gray-500">Format: JPG/PNG/WebP | Maks: 2MB</p>
        </div>
    </x-admin.form-wrapper>
@endsection
