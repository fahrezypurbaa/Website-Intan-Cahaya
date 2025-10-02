@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Daftar Training</h1>

    <a href="{{ route('admin.trainings.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Tambah Training</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Kategori</th>
                <th class="border px-4 py-2">Durasi</th>
                <th class="border px-4 py-2">Persyaratan</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainings as $training)
            <tr>
                <td class="border px-4 py-2">{{ $training->title }}</td>
                <td class="border px-4 py-2">{{ $training->category->name ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $training->duration }}</td>
                <td class="border px-4 py-2">{{ Str::limit($training->requirement, 50) }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.trainings.show', $training) }}" class="text-blue-500">Detail</a> |
                    <a href="{{ route('admin.trainings.edit', $training) }}" class="text-green-500">Edit</a> |
                    <form action="{{ route('admin.trainings.destroy', $training) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Hapus training ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
