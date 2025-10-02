@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-8 text-gray-800">✏️ Edit Artikel</h1>

        {{-- Notifikasi error --}}
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm">
                <strong class="block mb-2">Terjadi kesalahan:</strong>
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

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

                {{-- Tombol --}}
                <div class="flex justify-end gap-4">
                    <a href="{{ route('admin.articles.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-gradient-to-r from-[#73BA7D] to-[#4ca56c] text-white font-semibold rounded-lg shadow hover:scale-105 transform transition">
                        Update Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
