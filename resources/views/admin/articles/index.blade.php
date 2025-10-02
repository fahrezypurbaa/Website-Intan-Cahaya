@extends('layouts.admin')

@section('content')
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">📑 Daftar Artikel</h1>
        <a href="{{ route('admin.articles.create') }}"
            class="px-4 py-2 bg-gradient-to-r from-[#73BA7D] to-[#4ca56c] text-white font-semibold rounded-lg shadow hover:scale-105 transform transition">
            + Tambah Artikel
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-md border border-gray-100">
        <table class="min-w-full text-sm text-left">
            <thead>
                <tr class="bg-gradient-to-r from-[#144F5F]/10 to-[#73BA7D]/10 text-[#144F5F] uppercase text-xs font-bold">
                    <th class="px-6 py-3">Judul</th>
                    <th class="px-6 py-3">Tanggal</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($articles as $article)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $article->title }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $article->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">
                                <!-- Edit -->
                                <a href="{{ route('admin.articles.edit', $article) }}"
                                    class="px-3 py-1.5 bg-yellow-400/90 hover:bg-yellow-500 text-white text-sm font-medium rounded-lg shadow-sm transition">
                                    ✏️ Edit
                                </a>
                                <!-- Delete -->
                                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg shadow-sm transition">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
