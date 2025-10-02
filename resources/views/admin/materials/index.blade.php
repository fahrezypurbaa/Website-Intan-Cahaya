@extends('layouts.admin')

@section('title', 'Daftar Materi')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Materi</h1>
        <a href="{{ route('admin.materials.create') }}" 
           class="bg-[#73BA7D] hover:bg-green-700 text-white px-4 py-2 rounded shadow">
            + Tambah Materi
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full border border-gray-200 text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Training</th>
                    <th class="border px-4 py-2">Kelompok</th>
                    <th class="border px-4 py-2">Judul Materi</th>
                    <th class="border px-4 py-2 text-center">JP</th>
                    <th class="border px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($materials as $material)
                    <tr>
                        <td class="px-4 py-2">{{ $material->training->title }}</td>
                        <td class="px-4 py-2">{{ $material->group_name }}</td>
                        <td class="px-4 py-2">{{ $material->title }}</td>
                        <td class="px-4 py-2 text-center">{{ $material->jp }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('admin.materials.edit', $material) }}" 
                               class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.materials.destroy', $material) }}" 
                                  method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('Hapus materi ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($materials->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">
                            Belum ada materi
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
