@extends('layouts.admin')

@section('title', 'Daftar Materi')

@section('content')
    <div class="p-6">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-3">
            <h1 class="text-2xl font-bold text-gray-800">📚 Daftar Materi</h1>

            <div class="flex flex-col md:flex-row gap-3 items-center">
                {{-- Search Form --}}
                <form method="GET" action="{{ route('admin.materials.index') }}" class="flex items-center">
                    <input type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="🔍 Cari Training..." 
                        class="border border-gray-300 rounded-l-lg px-3 py-2 w-56 focus:outline-none focus:ring-2 focus:ring-green-400"
                    >
                    <button type="submit" 
                        class="bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-r-lg transition">
                        Cari
                    </button>
                    @if(request('search'))
                        <a href="{{ route('admin.materials.index') }}" 
                            class="ml-2 text-sm text-gray-500 hover:text-gray-700 underline">
                            Reset
                        </a>
                    @endif
                </form>

                {{-- Tombol Tambah --}}
                <a href="{{ route('admin.materials.create') }}"
                    class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow hover:scale-105 transform transition">
                    + Tambah Materi
                </a>
            </div>
        </div>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <x-admin.table>
            <x-slot name="head">
                <th class="px-4 py-3 text-center w-16">No</th>
                <th class="px-4 py-3">Training</th>
                <th class="px-4 py-3">Kategori</th>
                <th class="px-4 py-3">Judul / Kode Unit</th>
                <th class="px-4 py-3 text-center">JP</th>
                <th class="px-4 py-3 text-center">Kelompok</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </x-slot>

            @forelse($materials as $index => $material)
                @php $category = $material->training->category->name ?? ''; @endphp
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 text-center">{{ $materials->firstItem() + $index }}</td>
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $material->training->title }}</td>
                    <td class="px-4 py-3">{{ $category }}</td>

                    {{-- Kalau kategori Kemnaker --}}
                    @if (Str::contains(strtolower($category), 'kemnaker'))
                        <td class="px-4 py-3">{{ $material->title }}</td>
                        <td class="px-4 py-3 text-center">{{ $material->jp ?? '-' }}</td>
                        <td class="px-4 py-3 text-center">{{ $material->group_name ?? '-' }}</td>
                    @else
                        {{-- Kalau BNSP / Lainnya --}}
                        <td class="px-4 py-3">
                            <div class="flex flex-col">
                                <span class="font-semibold text-gray-800">{{ $material->kode_unit ?? '-' }}</span>
                                <span class="text-gray-600 text-sm">{{ $material->title }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-center">-</td>
                        <td class="px-4 py-3 text-center">-</td>
                    @endif

                    {{-- Aksi --}}
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.materials.edit', $material) }}"
                                class="px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-medium rounded shadow-sm transition">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('admin.materials.destroy', $material) }}" method="POST"
                                onsubmit="return confirm('Hapus materi ini?')">
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
                    <td colspan="7" class="text-center text-gray-500 py-6">
                        Tidak ada materi untuk training "{{ request('search') }}".
                    </td>
                </tr>
            @endforelse
        </x-admin.table>

        {{-- Pagination --}}
        @if ($materials->hasPages())
            <div class="flex justify-center mt-6">
                {{ $materials->links('vendor.pagination.tailwind') }}
            </div>
        @endif
    </div>
@endsection
