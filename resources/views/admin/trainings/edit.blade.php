@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Training</h1>

    <form action="{{ route('admin.trainings.update', $training->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Kategori</label>
            <select name="category_id" class="w-full border rounded p-2">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $training->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Judul</label>
            <input type="text" name="title" class="w-full border rounded p-2" value="{{ old('title', $training->title) }}">
        </div>

        <div>
            <label>Slug</label>
            <input type="text" name="slug" class="w-full border rounded p-2" value="{{ old('slug', $training->slug) }}">
        </div>

        <div>
            <label>Deskripsi</label>
            <textarea name="description" class="w-full border rounded p-2" rows="4">{{ old('description', $training->description) }}</textarea>
        </div>

        <div>
            <label>Durasi</label>
            <input type="text" name="duration" class="w-full border rounded p-2" value="{{ old('duration', $training->duration) }}">
        </div>

        <div>
            <label>Persyaratan</label>
            <textarea name="requirement" class="w-full border rounded p-2" rows="4">{{ old('requirement', $training->requirement) }}</textarea>
        </div>

        <div>
            <label>Mode</label>
            <input type="text" name="mode" class="w-full border rounded p-2" value="{{ old('mode', $training->mode) }}">
        </div>

        <div>
            <label>Gambar</label>
            <input type="file" name="image" class="w-full border rounded p-2">
            @if($training->image)
                <div class="mt-2">
                    <p class="text-sm text-gray-600">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $training->image) }}" alt="{{ $training->title }}" class="w-32 h-32 object-cover mt-1">
                </div>
            @endif
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update</button>
            <a href="{{ route('admin.trainings.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Batal</a>
        </div>
    </form>
</div>
@endsection