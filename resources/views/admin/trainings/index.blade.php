@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">📘 Daftar Training</h1>
        <a href="{{ route('admin.trainings.create') }}" 
           class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow hover:scale-105 transform transition">
            + Tambah Training
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-xl border border-gray-100">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-50 border-b text-gray-700 uppercase text-xs font-semibold">
                <tr>
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
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $training->title }}</td>
                        <td class="px-4 py-3">{{ $training->category->name ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $training->duration }}</td>
                        <td class="px-4 py-3">{{ Str::limit($training->requirement, 50) }}</td>
                        <td class="px-4 py-3">{{ Str::limit($training->facilities, 50) }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.trainings.show', $training) }}" 
                                   class="px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium rounded shadow-sm transition">
                                    🔍 Detail
                                </a>
                                <a href="{{ route('admin.trainings.edit', $training) }}" 
                                   class="px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-medium rounded shadow-sm transition">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.trainings.destroy', $training) }}" method="POST" onsubmit="return confirm('Hapus training ini?')">
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
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            Belum ada training yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
