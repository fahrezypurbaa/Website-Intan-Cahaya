@extends('layouts.admin')

@section('title', 'Daftar Materi')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">📚 Daftar Materi</h1>
            <a href="{{ route('admin.materials.create') }}"
                class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow hover:scale-105 transform transition">
                + Tambah Materi
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <x-admin.table>
            <x-slot name="head">
                <th class="px-4 py-3 text-center w-16">No</th>
                <th class="px-4 py-3">Training</th>
                <th class="px-4 py-3">Kelompok</th>
                <th class="px-4 py-3">Judul Materi</th>
                <th class="px-4 py-3 text-center">JP</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </x-slot>

            @forelse($materials as $index => $material)
                <tr class="hover:bg-gray-50 transition">
                    {{-- Nomor urut tetap mengikuti pagination --}}
                    <td class="px-4 py-3 text-center">
                        {{ $materials->firstItem() + $index }}
                    </td>
                    <td class="px-4 py-3">{{ $material->training->title }}</td>
                    <td class="px-4 py-3">{{ $material->group_name }}</td>
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $material->title }}</td>
                    <td class="px-4 py-3 text-center">{{ $material->jp }}</td>
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
                    <td colspan="6" class="text-center text-gray-500 py-6">
                        Belum ada materi.
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
