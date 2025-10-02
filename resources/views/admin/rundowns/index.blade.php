@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">📅 Daftar Rundown Training</h1>
        <a href="{{ route('admin.rundowns.create') }}" 
           class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow hover:scale-105 transform transition">
            + Tambah Rundown
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
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Pelatihan</th>
                    <th class="px-4 py-3">Hari</th>
                    <th class="px-4 py-3">Jam</th>
                    <th class="px-4 py-3">Instruktur</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($rundowns as $rundown)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 font-medium text-gray-800">
                            @if($rundown->training)
                                {{ $rundown->training->title }}
                            @else
                                <span class="text-red-500">Training tidak ditemukan</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">Hari ke-{{ $rundown->day }}</td>
                        <td class="px-4 py-3">{{ $rundown->time }}</td>
                        <td class="px-4 py-3">{{ $rundown->instructor ?? '-' }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.rundowns.edit', $rundown->id) }}" 
                                   class="px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-medium rounded shadow-sm transition">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.rundowns.destroy', $rundown->id) }}" method="POST" onsubmit="return confirm('Hapus rundown ini?')">
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
                            Tidak ada data rundown.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $rundowns->links() }}
    </div>
</div>
@endsection
