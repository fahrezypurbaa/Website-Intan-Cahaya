@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Materi</h1>

    <a href="{{ route('admin.materials.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Materi</a>

    <table class="w-full mt-4 border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Training</th>
                <th class="border px-4 py-2">Kelompok</th>
                <th class="border px-4 py-2">Judul Materi</th>
                <th class="border px-4 py-2">JP</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $material)
                <tr>
                    <td class="border px-4 py-2">{{ $material->training->title }}</td>
                    <td class="border px-4 py-2">{{ $material->group_name }}</td>
                    <td class="border px-4 py-2">{{ $material->title }}</td>
                    <td class="border px-4 py-2 text-center">{{ $material->jp }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.materials.edit', $material) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('admin.materials.destroy', $material) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Hapus materi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <div class="mt-4">
        {{ $materials->links() }}
    </div> --}}
</div>
@endsection
