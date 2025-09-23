@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Edit Artikel</h1>

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

        <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label class="block text-sm font-medium">Judul Artikel</label>
                <input type="text" name="title" value="{{ old('title', $article->title) }}"
                    class="w-full border rounded p-2 focus:ring focus:ring-green-300" required>
            </div>

            {{-- Thumbnail lama --}}
            @if ($article->thumbnail)
                <div>
                    <label class="block text-sm font-medium">Thumbnail Sekarang</label>
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail"
                        class="h-32 rounded border mb-2">
                </div>
            @endif

            {{-- Upload thumbnail baru --}}
            <div>
                <label class="block text-sm font-medium">Ganti Thumbnail (opsional)</label>
                <input type="file" name="thumbnail" class="w-full border rounded p-2">
                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin ganti. Format: JPG/PNG, max 2MB</p>
            </div>

            {{-- Konten --}}
            <div>
                <label class="block text-sm font-medium">Konten</label>
                <textarea name="content" rows="8" class="w-full border rounded p-2 focus:ring focus:ring-green-300" required>{{ old('content', $article->content) }}</textarea>
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.articles.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Update Artikel
                </button>
            </div>
        </form>
    </div>
@endsection
