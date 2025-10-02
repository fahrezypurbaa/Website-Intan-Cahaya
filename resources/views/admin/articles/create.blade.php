@extends('layouts.admin')

@section('content')
<x-admin.form-wrapper 
    title="📝 Tambah Artikel Baru" 
    :action="route('admin.articles.store')" 
    method="POST" 
    :back="route('admin.articles.index')" 
    enctype="multipart/form-data"
    submitLabel="Simpan Artikel">

    {{-- Judul --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Judul Artikel</label>
        <input type="text" name="title" value="{{ old('title') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#73BA7D] focus:border-[#73BA7D]"
            placeholder="Masukkan judul artikel..." required>
    </div>

    {{-- Thumbnail --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Thumbnail</label>
        <input type="file" name="thumbnail"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#73BA7D]">
        <p class="text-xs text-gray-500 mt-1">Format: JPG/PNG, maksimal 2MB</p>
    </div>

    {{-- Excerpt --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Excerpt (Ringkasan)</label>
        <textarea name="excerpt" rows="3"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#73BA7D]">{{ old('excerpt') }}</textarea>
        <p class="text-xs text-gray-500 mt-1">Tuliskan ringkasan singkat artikel</p>
    </div>

    {{-- Konten --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Konten</label>
        <textarea name="content" rows="8"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#73BA7D]" required>{{ old('content') }}</textarea>
    </div>
</x-admin.form-wrapper>
@endsection
