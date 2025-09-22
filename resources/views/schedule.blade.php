@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-12">
    <h2 class="text-3xl font-bold mb-6">Jadwal Pelatihan 2025</h2>

    @if($schedules->count())
        <table class="min-w-full border border-gray-300 rounded-lg text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left">Tanggal</th>
                    <th class="px-4 py-2 text-left">Pelatihan</th>
                    <th class="px-4 py-2 text-left">Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                    <tr class="border-b">
                        <td class="px-4 py-2">
                            {{ \Carbon\Carbon::parse($schedule->start_date)->format('d M') }} -
                            {{ \Carbon\Carbon::parse($schedule->end_date)->format('d M Y') }}
                        </td>
                        <td class="px-4 py-2">{{ $schedule->title }}</td>
                        <td class="px-4 py-2">{{ $schedule->location ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada jadwal tersedia untuk tahun 2025.</p>
    @endif
</div>
@endsection
