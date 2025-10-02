@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Daftar Rundown Training</h1>

    <a href="{{ route('admin.rundowns.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        Tambah Rundown
    </a>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">No</th>
                <th class="p-2 border">Pelatihan</th>
                <th class="p-2 border">Hari</th>
                <th class="p-2 border">Jam</th>
                <th class="p-2 border">Instruktur</th>
                <th class="p-2 border w-32 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rundowns as $rundown)
            <tr>
                <td class="border p-2">{{ $loop->iteration }}</td>
                <td class="border p-2">
                    @if($rundown->training)
                        {{ $rundown->training->title }}
                    @else
                        <span class="text-red-500">Training tidak ditemukan</span>
                    @endif
                </td>
                <td class="border p-2">Hari ke-{{ $rundown->day }}</td>
                <td class="border p-2">{{ $rundown->time }}</td>
                <td class="border p-2">{{ $rundown->instructor ?? '-' }}</td>
                <td class="border p-2 text-center">
                    <a href="{{ route('admin.rundowns.edit', $rundown->id) }}" 
                       class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                        Edit
                    </a>
                    <form action="{{ route('admin.rundowns.destroy', $rundown->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-2 py-1 rounded text-sm ml-1"
                                onclick="return confirm('Hapus rundown ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="border p-4 text-center">
                    Tidak ada data rundown
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $rundowns->links() }}
    </div>
</div>
@endsection