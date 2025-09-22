@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-4">
    <h2 class="text-3xl font-bold mb-8 text-center">Jadwal Pelatihan 2025</h2>

    @if($schedules->count())
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm text-left border border-gray-200 rounded-lg">
                <thead style="background-color: #73BA7D;" class="text-white">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Pelatihan</th>
                        <th class="px-4 py-3">Lokasi</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($schedules as $index => $schedule)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $index + 1 }}</td>
                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($schedule->start_date)->format('d M') }}
                                -
                                {{ \Carbon\Carbon::parse($schedule->end_date)->format('d M Y') }}
                            </td>
                            <td class="px-4 py-3 font-medium">{{ $schedule->title }}</td>
                            <td class="px-4 py-3">{{ $schedule->location ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <a href="#"
                                   class="inline-block px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                                    Daftar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-gray-600">Tidak ada jadwal tersedia untuk tahun 2025.</p>
    @endif
</div>
@endsection
