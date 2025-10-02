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
    <x-admin.table>
        <x-slot name="head">
            <th class="px-6 py-3">Judul</th>
            <th class="px-6 py-3">Tanggal</th>
            <th class="px-6 py-3 text-center">Aksi</th>
        </x-slot>

        @forelse ($articles as $article)
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
        @empty
            <tr>
                <td colspan="3" class="px-6 py-6 text-center text-gray-500">
                    Belum ada artikel.
                </td>
            </tr>
        @endforelse
    </x-admin.table>
@endsection
