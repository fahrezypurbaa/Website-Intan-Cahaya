@extends('layouts.admin')

@section('title', 'Tambah Training')

@section('content')
    <x-admin.form-wrapper 
        title="📚 Tambah Training"
        action="{{ route('admin.trainings.store') }}"
        method="POST"
        submit="✅ Simpan Training"
        back="{{ route('admin.trainings.index') }}"
        enctype="multipart/form-data"
    >
        {{-- Kategori --}}
        <div>
            <label class="block font-medium mb-1">Kategori</label>
            <select name="category_id" class="w-full border rounded p-2" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                   value="{{ old('title') }}" required>
            @error('title') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Slug (readonly) --}}
<div class="mb-4">
    <label class="block font-medium mb-1">Slug</label>
    <input type="text" id="slug" name="slug" 
           class="w-full border rounded p-2 bg-gray-100 text-gray-600" 
           value="{{ old('slug') }}" readonly>
</div>

        {{-- Deskripsi --}}
        <div>
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="description" class="w-full border rounded p-2" rows="4" required>{{ old('description') }}</textarea>
            @error('description') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Durasi --}}
        <div>
            <label class="block font-medium mb-1">Durasi</label>
            <input type="text" name="duration" class="w-full border rounded p-2" 
                   value="{{ old('duration') }}" required>
            @error('duration') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Persyaratan --}}
        <div>
            <label class="block font-medium mb-1">Persyaratan</label>
            <textarea name="requirement" class="w-full border rounded p-2" rows="3">{{ old('requirement') }}</textarea>
            @error('requirement') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Fasilitas --}}
        <div>
            <label class="block font-medium mb-1">Fasilitas</label>
            <textarea name="facilities" class="w-full border rounded p-2" rows="3">{{ old('facilities') }}</textarea>
            @error('facilities') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Mode --}}
        <div>
            <label class="block font-medium mb-1">Mode</label>
            <input type="text" name="mode" class="w-full border rounded p-2" 
                   value="{{ old('mode') }}">
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
            <p class="text-xs text-gray-500 mt-1">Format: JPG/PNG | Maks: 2MB</p>
            @error('image') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>
    </x-admin.form-wrapper>
@endsection
