@extends('layouts.admin')

@section('title', 'Daftar Materi')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">📚 Daftar Materi</h1>
        <a href="{{ route('admin.materials.create') }}" 
           class="px-4 py-2 bg-gradient-to-r from-[#73BA7D] to-[#4ca56c] text-white font-semibold rounded-lg shadow hover:scale-105 transform transition">
            + Tambah Materi
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <x-admin.table>
        <x-slot name="head">
            <th class="px-4 py-3">Training</th>
            <th class="px-4 py-3">Kelompok</th>
            <th class="px-4 py-3">Judul Materi</th>
            <th class="px-4 py-3 text-center">JP</th>
            <th class="px-4 py-3 text-center">Aksi</th>
        </x-slot>

        @forelse($materials as $material)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-4 py-3">{{ $material->training->title }}</td>
                <td class="px-4 py-3">{{ $material->group_name }}</td>
                <td class="px-4 py-3 font-medium text-gray-800">{{ $material->title }}</td>
                <td class="px-4 py-3 text-center">{{ $material->jp }}</td>
                <td class="px-4 py-3 text-center">
                    <div class="flex justify-center gap-3">
                        <a href="{{ route('admin.materials.edit', $material) }}" 
                           class="text-blue-600 hover:underline">✏️ Edit</a>
                        <form action="{{ route('admin.materials.destroy', $material) }}" 
                              method="POST" onsubmit="return confirm('Hapus materi ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-gray-500 py-6">
                    Belum ada materi.
                </td>
            </tr>
        @endforelse
    </x-admin.table>
</div>
@endsection
