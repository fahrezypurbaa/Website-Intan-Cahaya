@extends('layouts.admin')

@section('content')
<x-admin.form-wrapper 
    title="✏️ Edit Artikel" 
    :action="route('admin.articles.update', $article)" 
    method="PUT" 
    :back="route('admin.articles.index')" 
    enctype="multipart/form-data"
    submitLabel="Update Artikel">

    {{-- Judul --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Judul Artikel</label>
        <input type="text" name="title" value="{{ old('title', $article->title) }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#73BA7D] focus:border-[#73BA7D]"
            required>
    </div>

    {{-- Thumbnail lama --}}
    @if ($article->thumbnail)
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Thumbnail Sekarang</label>
            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail"
                class="h-32 rounded-lg border mb-3 shadow-sm">
        </div>
    @endif

    {{-- Upload thumbnail baru --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Ganti Thumbnail (opsional)</label>
        <input type="file" name="thumbnail"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#73BA7D]">
        <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin ganti. Format: JPG/PNG, max 2MB</p>
    </div>

    {{-- Konten --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Konten</label>
        <textarea name="content" rows="8"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#73BA7D]" required>{{ old('content', $article->content) }}</textarea>
    </div>
</x-admin.form-wrapper>
@endsection
