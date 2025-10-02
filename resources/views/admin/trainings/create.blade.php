@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Training</h1>

    <form action="{{ route('admin.trainings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label>Kategori</label>
            <select name="category_id" class="w-full border rounded p-2">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Judul</label>
            <input type="text" name="title" class="w-full border rounded p-2" value="{{ old('title') }}">
        </div>

        <div>
            <label>Slug</label>
            <input type="text" name="slug" class="w-full border rounded p-2" value="{{ old('slug') }}">
        </div>

        <div>
            <label>Deskripsi</label>
            <textarea name="description" class="w-full border rounded p-2" rows="4">{{ old('description') }}</textarea>
        </div>

        <div>
            <label>Durasi</label>
            <input type="text" name="duration" class="w-full border rounded p-2" value="{{ old('duration') }}">
        </div>

        <div>
            <label>Persyaratan</label>
            <textarea name="requirement" class="w-full border rounded p-2" rows="4">{{ old('requirement') }}</textarea>
        </div>

        <div>
            <label>Mode</label>
            <input type="text" name="mode" class="w-full border rounded p-2" value="{{ old('mode') }}">
        </div>

        <div>
            <label>Gambar</label>
            <input type="file" name="image" class="w-full border rounded p-2">
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
    </form>
</div>
@endsection
