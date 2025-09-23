@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Tambah Artikel Baru</h1>

        {{-- Notifikasi error --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Judul --}}
            <div>
                <label class="block text-sm font-medium">Judul Artikel</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="w-full border rounded p-2 focus:ring focus:ring-green-300" required>
            </div>

            {{-- Thumbnail --}}
            <div>
                <label class="block text-sm font-medium">Thumbnail</label>
                <input type="file" name="thumbnail" class="w-full border rounded p-2">
                <p class="text-xs text-gray-500 mt-1">Format: JPG/PNG, max 2MB</p>
            </div>

            {{-- Excerpt --}}
            <div>
                <label class="block text-sm font-medium">Excerpt (Ringkasan)</label>
                <textarea name="excerpt" rows="3" class="w-full border rounded p-2 focus:ring focus:ring-green-300">{{ old('excerpt') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Isi ringkasan singkat artikel, max 2–3 kalimat</p>
            </div>

            {{-- Konten --}}
            <div>
                <label class="block text-sm font-medium">Konten</label>
                <textarea name="content" rows="8" class="w-full border rounded p-2 focus:ring focus:ring-green-300" required>{{ old('content') }}</textarea>
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.articles.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Simpan Artikel
                </button>
            </div>
        </form>
    </div>
@endsection
