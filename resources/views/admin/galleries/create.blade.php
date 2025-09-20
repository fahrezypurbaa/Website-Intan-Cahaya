@extends('layouts.admin')

@section('title', 'Tambah Foto Gallery')

@section('content')
<div class="max-w-xl">
    <a href="{{ route('admin.galleries.index') }}" class="text-sm text-blue-600 mb-4 inline-block">&larr; Kembali</a>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded mb-4">
            <ul class="text-sm">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded p-2">
        </div>

        <div>
    <label class="block text-sm font-medium">Kategori</label>
    <select name="category" class="w-full border rounded p-2">
        <option value="">-- pilih kategori --</option>
        <option value="pelatihan">Pelatihan</option>
        <option value="seminar">Seminar</option>
        <option value="praktik">Praktik Lapangan</option>
        <option value="lainnya">Lainnya</option>
    </select>
</div>


        <div>
            <label class="block text-sm font-medium">Gambar (jpg/png/webp)</label>
            <input type="file" name="image" accept="image/*" class="w-full">
        </div>

        <div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
