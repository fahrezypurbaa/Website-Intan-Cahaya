@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Jadwal Pelatihan</h2>
    <a href="{{ route('admin.scheduleadmin.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ Tambah Jadwal</a>

    <table class="w-full mt-4 border">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-3 py-2">Tanggal</th>
                <th class="px-3 py-2">Pelatihan</th>
                <th class="px-3 py-2">Lokasi</th>
                <th class="px-3 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr class="border-b">
                    <td class="px-3 py-2">
                        {{ \Carbon\Carbon::parse($schedule->start_date)->format('d M') }} -
                        {{ \Carbon\Carbon::parse($schedule->end_date)->format('d M Y') }}
                    </td>
                    <td class="px-3 py-2">{{ $schedule->title }}</td>
                    <td class="px-3 py-2">{{ $schedule->location ?? '-' }}</td>
                    <td class="px-3 py-2">
                        <a href="{{ route('admin.scheduleadmin.edit', $schedule) }}" class="text-blue-600">Edit</a> |
                        <form action="{{ route('admin.scheduleadmin.destroy', $schedule) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus jadwal ini?')" class="text-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $schedules->links() }}
    </div>
</div>
@endsection
