@extends('layouts.admin')

@section('title', 'Edit Artikel - Intan Safety')

@section('content')
<div class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-8">
    <h1 class="text-2xl font-bold text-[#144F5F] mb-6">Edit Artikel</h1>

    {{-- Pesan sukses/error --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Informasi Utama --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-3 border-b pb-1">Informasi Utama</h2>

            {{-- Judul --}}
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Artikel</label>
                <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}"
                    class="w-full border-gray-300 rounded-lg focus:ring-[#144F5F] focus:border-[#144F5F]" 
                    placeholder="Masukkan judul artikel..." required>
            </div>

            {{-- Slug --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Slug (otomatis / opsional)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $article->slug) }}"
                    class="w-full border-gray-300 rounded-lg focus:ring-[#144F5F] focus:border-[#144F5F]" 
                    placeholder="contoh: pentingnya-sertifikasi-k3">
            </div>

            {{-- Tanggal Publikasi --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Publikasi</label>
                <input type="date" name="created_at" value="{{ old('created_at', $article->created_at->format('Y-m-d')) }}"
                    class="border-gray-300 rounded-lg focus:ring-[#144F5F] focus:border-[#144F5F]">
            </div>

            {{-- Thumbnail --}}
            <div class="mb-4">
                <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail"
                    accept="image/png, image/jpeg"
                    class="w-full border-gray-300 rounded-lg focus:ring-[#144F5F] focus:border-[#144F5F]">
                <p class="text-xs text-gray-500 mt-1">Format JPG/PNG, maksimal 2MB</p>

                {{-- Preview Gambar --}}
                <div id="preview-container" class="mt-3 {{ $article->thumbnail ? '' : 'hidden' }}">
                    <p class="text-xs text-gray-600 mb-1">Preview Thumbnail:</p>
                    <img id="preview-thumbnail" 
                        src="{{ $article->thumbnail ? asset('storage/' . $article->thumbnail) : '' }}"
                        class="w-48 h-32 object-cover rounded-lg border">
                </div>
            </div>
        </div>

        {{-- Konten Artikel --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-3 border-b pb-1">Konten Artikel</h2>

            {{-- Excerpt --}}
            <div class="mb-4">
                <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-1">Excerpt (Ringkasan)</label>
                <textarea name="excerpt" id="excerpt" rows="3"
                    class="w-full border-gray-300 rounded-lg focus:ring-[#144F5F] focus:border-[#144F5F]" 
                    placeholder="Tuliskan ringkasan singkat artikel...">{{ old('excerpt', $article->excerpt) }}</textarea>
            </div>

            {{-- Konten Lengkap --}}
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Konten Lengkap</label>
                <textarea name="content" id="content" rows="10"
                    class="w-full border-gray-300 rounded-lg focus:ring-[#144F5F] focus:border-[#144F5F]" 
                    placeholder="Tulis isi artikel di sini..." required>{{ old('content', $article->content) }}</textarea>
            </div>
        </div>

        {{-- Informasi Tambahan --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-3 border-b pb-1">Informasi Tambahan</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nama Penulis --}}
                <div>
                    <label for="author_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Penulis</label>
                    <input type="text" name="author_name" id="author_name" value="{{ old('author_name', $article->author_name) }}"
                        class="w-full border-gray-300 rounded-lg focus:ring-[#144F5F] focus:border-[#144F5F]">
                </div>

                {{-- Bio Penulis --}}
                <div>
                    <label for="author_bio" class="block text-sm font-medium text-gray-700 mb-1">Bio Penulis</label>
                    <input type="text" name="author_bio" id="author_bio" value="{{ old('author_bio', $article->author_bio) }}"
                        class="w-full border-gray-300 rounded-lg focus:ring-[#144F5F] focus:border-[#144F5F]" 
                        placeholder="Tuliskan bio singkat penulis">
                </div>

                {{-- Meta Title --}}
                <div>
                    <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-1">Meta Title (SEO)</label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $article->meta_title) }}"
                        class="w-full border-gray-300 rounded-lg focus:ring-[#144F5F] focus:border-[#144F5F]">
                </div>

                {{-- Meta Description --}}
                <div>
                    <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-1">Meta Description (SEO)</label>
                    <textarea name="meta_description" id="meta_description" rows="3"
                        class="w-full border-gray-300 rounded-lg focus:ring-[#144F5F] focus:border-[#144F5F]" 
                        placeholder="Deskripsi singkat untuk SEO">{{ old('meta_description', $article->meta_description) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Tombol Submit --}}
        <div class="pt-4 border-t mt-8 flex justify-end">
            <button type="submit" 
                class="bg-[#144F5F] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#0e3c4b] transition">
                Perbarui Artikel
            </button>
        </div>
    </form>
</div>
@endsection
