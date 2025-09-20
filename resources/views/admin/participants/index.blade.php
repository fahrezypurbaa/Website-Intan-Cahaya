@extends('layouts.admin')

@section('title', 'Participant')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-bold">Daftar Peserta</h2>
    <a href="{{ route('admin.participants.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Peserta</a>
</div>

<div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3">Nama</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Training</th>
                <th class="px-6 py-3 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $p)
            <tr class="divide-x divide-gray-200">
                <td class="px-6 py-4">{{ $p->name }}</td>
                <td class="px-6 py-4">{{ $p->email }}</td>
                <td class="px-6 py-4">
                    {{ $p->trainings->pluck('name')->join(', ') }}
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.participants.edit', $p) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.participants.destroy', $p) }}" method="POST" class="inline">
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
