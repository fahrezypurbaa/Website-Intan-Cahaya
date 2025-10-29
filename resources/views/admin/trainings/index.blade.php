@extends('layouts.admin')

@section('title', 'Daftar Training')

@section('content')
    <div class="p-6">

        @extends('layouts.admin')

    @section('title', 'Daftar Training')

    @section('content')
        <div class="p-6 space-y-6">

            {{-- HEADER --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                    📘 <span>Daftar Training</span>
                </h1>

                <a href="{{ route('admin.trainings.create') }}"
                    class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition transform hover:scale-105">
                    + Tambah Training
                </a>
            </div>

            {{-- FORM FILTER & SEARCH --}}
            <div class="bg-white p-5 shadow-md rounded-xl border border-gray-100">
                <form method="GET" action="{{ route('admin.trainings.index') }}"
                    class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">

                    {{-- Bagian kiri (search + kategori) --}}
                    <div class="flex flex-col sm:flex-row items-center gap-3 w-full">

                        {{-- Search Bar --}}
                        <div class="relative w-full sm:w-2/3">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari judul atau kategori training..."
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-400 focus:outline-none text-gray-700 placeholder-gray-400">
                        </div>

                        {{-- Dropdown Kategori --}}
                        <select name="category_id"
                            class="border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-400 focus:outline-none text-gray-700 w-full sm:w-1/3">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tombol cari + reset --}}
                    <div class="flex gap-2 justify-center sm:justify-end w-full sm:w-auto">
                        <button type="submit"
                            class="px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold shadow-md transition">
                            Cari
                        </button>

                        @if (request('search') || request('category_id'))
                            <a href="{{ route('admin.trainings.index') }}"
                                class="px-6 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg font-medium transition">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- ALERT --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Table --}}
            <div class="overflow-x-auto bg-white shadow-md rounded-xl border border-gray-100">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-50 border-b text-gray-700 uppercase text-xs font-semibold">
                        <tr>
                            <th class="px-4 py-3">NO</th>
                            <th class="px-4 py-3">Judul</th>
                            <th class="px-4 py-3">Kategori</th>
                            <th class="px-4 py-3">Durasi</th>
                            <th class="px-4 py-3">Persyaratan</th>
                            <th class="px-4 py-3">Fasilitas</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($trainings as $training)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3">
                                    {{ $loop->iteration + ($trainings->currentPage() - 1) * $trainings->perPage() }}
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-800">{{ $training->title }}</td>
                                <td class="px-4 py-3">{{ $training->category->name ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $training->duration }}</td>
                                <td class="px-4 py-3">{{ Str::limit($training->requirement, 50) }}</td>
                                <td class="px-4 py-3">{{ Str::limit($training->facilities, 50) }}</td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('admin.trainings.edit', $training) }}"
                                            class="px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-medium rounded shadow-sm transition">
                                            ✏️ Edit
                                        </a>
                                        <form action="{{ route('admin.trainings.destroy', $training) }}" method="POST"
                                            onsubmit="return confirm('Hapus training ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded shadow-sm transition">
                                                🗑️ Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                                    Tidak ditemukan training
                                    @if (request('search'))
                                        dengan keyword "<b>{{ request('search') }}</b>"
                                    @endif
                                    @if (request('category_id'))
                                        pada kategori
                                        "<b>{{ optional($categories->firstWhere('id', request('category_id')))->name }}</b>"
                                    @endif.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($trainings->hasPages())
                <div class="flex justify-center mt-6">
                    {{ $trainings->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
    @endsection
