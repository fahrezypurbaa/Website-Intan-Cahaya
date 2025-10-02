@extends('layouts.admin')

@section('title', 'Edit Training')

@section('content')
    <x-admin.form-wrapper 
        title="✏️ Edit Training"
        action="{{ route('admin.trainings.update', $training->id) }}"
        method="POST"
        submit="💾 Update Training"
        back="{{ route('admin.trainings.index') }}"
        enctype="multipart/form-data"
    >
        @method('PUT')

        {{-- Kategori --}}
        <div>
            <label class="block font-medium mb-1">Kategori</label>
            <select name="category_id" class="w-full border rounded p-2" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id', $training->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Judul --}}
        <div>
            <label class="block font-medium mb-1">Judul</label>
            <input type="text" name="title" class="w-full border rounded p-2" 
                   value="{{ old('title', $training->title) }}" required>
            @error('title') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Slug --}}
        <div>
            <label class="block font-medium mb-1">Slug</label>
            <input type="text" name="slug" class="w-full border rounded p-2" 
                   value="{{ old('slug', $training->slug) }}" required>
            @error('slug') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="description" class="w-full border rounded p-2" rows="4" required>{{ old('description', $training->description) }}</textarea>
            @error('description') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Durasi --}}
        <div>
            <label class="block font-medium mb-1">Durasi</label>
            <input type="text" name="duration" class="w-full border rounded p-2" 
                   value="{{ old('duration', $training->duration) }}">
            @error('duration') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Persyaratan --}}
        <div>
            <label class="block font-medium mb-1">Persyaratan</label>
            <textarea name="requirement" class="w-full border rounded p-2" rows="3">{{ old('requirement', $training->requirement) }}</textarea>
            @error('requirement') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Fasilitas --}}
        <div>
            <label class="block font-medium mb-1">Fasilitas</label>
            <textarea name="facilities" class="w-full border rounded p-2" rows="3">{{ old('facilities', $training->facilities) }}</textarea>
            @error('facilities') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Mode --}}
        <div>
            <label class="block font-medium mb-1">Mode</label>
            <input type="text" name="mode" class="w-full border rounded p-2" 
                   value="{{ old('mode', $training->mode) }}">
            @error('mode') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Gambar --}}
        <div>
            <label class="block font-medium mb-1">Gambar</label>
            <input type="file" name="image" 
                   class="w-full text-sm border rounded-lg file:mr-4 file:py-2 file:px-4
                          file:rounded-lg file:border-0 file:text-sm file:font-semibold
                          file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin ganti</p>

            @if ($training->image)
                <div class="mt-2">
                    <p class="text-sm text-gray-600">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $training->image) }}" 
                         alt="{{ $training->title }}" 
                         class="w-32 h-32 object-cover mt-1 rounded border">
                </div>
            @endif

            @error('image') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>
    </x-admin.form-wrapper>
@endsection
