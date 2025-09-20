@extends('layouts.admin')

@section('title', 'Training')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-bold">Daftar Training</h2>
    <a href="{{ route('admin.trainings.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Training</a>
</div>

<div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-6 py-3">Tanggal</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Peserta</th>
                <th class="px-6 py-3 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($trainings as $training)
            <tr>
                <td class="px-6 py-4">{{ $training->name }}</td>
                <td class="px-6 py-4">{{ $training->start_date }} - {{ $training->end_date }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800">{{ ucfirst($training->status) }}</span>
                </td>
                <td class="px-6 py-4">{{ $training->participants->count() }}</td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.trainings.edit', $training) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.trainings.destroy', $training) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
