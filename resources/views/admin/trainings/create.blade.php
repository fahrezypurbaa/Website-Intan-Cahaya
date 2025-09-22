@extends('layouts.admin')

@section('title','Tambah Training')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-2xl mx-auto">
    <h2 class="text-xl font-bold mb-4">Tambah Training</h2>

    <form action="{{ route('admin.trainings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block font-semibold">Judul</label>
            <input type="text" name="title" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Kategori</label>
            <select name="category_id" class="w-full border px-3 py-2 rounded" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        <div>
            <label class="block font-semibold">Durasi</label>
            <input type="text" name="duration" class="w-full border px-3 py-2 rounded" placeholder="Misal: 5 Hari">
        </div>

        <div>
            <label class="block font-semibold">Syarat</label>
            <input type="text" name="requirement" class="w-full border px-3 py-2 rounded" placeholder="Misal: Min D3">
        </div>

        <div>
            <label class="block font-semibold">Mode</label>
            <select name="mode" class="w-full border px-3 py-2 rounded">
                <option value="Online Training">Online Training</option>
                <option value="Offline Training">Offline Training</option>
                <option value="Blended Training">Blended Training</option>
            </select>
        </div>

        <div>
            <label class="block font-semibold">Gambar</label>
            <input type="file" name="image" class="w-full border px-3 py-2 rounded">
        </div>

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Simpan
        </button>
    </form>
</div>
@endsection
