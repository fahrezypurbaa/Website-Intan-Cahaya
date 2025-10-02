@extends('layouts.app')

@section('content')
    @php
        // fallback groups jika controller belum mengirimnya
        $groups = $groups ?? [
            'Kelompok Dasar',
            'Kelompok Inti',
            'Kelompok Penunjang',
            'Praktek Pemeriksaan',
            'Evaluasi',
        ];

        // pastikan $training ada (hanya untuk safety)
        $training = $training ?? null;
    @endphp

    <div class="max-w-4xl mx-auto py-12 px-4">
        @if ($training && $training->image)
            <img src="{{ asset('storage/' . $training->image) }}" class="w-full h-64 object-cover rounded mb-6">
        @endif

        <h1 class="text-3xl font-bold mb-4">{{ $training->title ?? '-' }}</h1>
        <p class="text-gray-600 mb-4">{{ $training->description ?? '' }}</p>

        <ul class="space-y-2 mb-6">
            @if (!empty($training->duration))
                <li>🗓 {{ $training->duration }}</li>
            @endif
            @if (!empty($training->requirement))
                <li>🎓 {{ $training->requirement }}</li>
            @endif
            @if (!empty($training->mode))
                <li>📌{{ $training->mode }}</li>
            @endif
            <li>📂{{ $training->category->name ?? '-' }}</li>

            @if (!empty($training->facilities))
                <li>📂{{ $training->facilities }}</li>
            @endif
        </ul>

@if ($training->rundowns->count())
    <h2 class="text-2xl font-bold text-[#144F5F] mt-8 mb-4 text-center uppercase">Rundown</h2>

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white">
                <tr>
                    <th class="py-3 px-4 text-left">Hari</th>
                    <th class="py-3 px-4 text-left">Pukul</th>
                    <th class="py-3 px-4 text-left">Instruktur</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($training->rundowns as $rundown)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 font-semibold text-gray-700">
                            Hari - {{ $rundown->day }}
                        </td>
                        <td class="py-3 px-4 text-gray-600">
                            {{ $rundown->time }}
                        </td>
                        <td class="py-3 px-4 text-gray-600">
                            {{ $rundown->instructor ?? '-' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif


        <h2 class="text-xl font-bold mb-4 text-center">MATERI PEMBINAAN</h2>

        <table class="w-full border-collapse border text-sm">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="p-2 text-left">MATERI</th>
                    <th class="p-2 w-20 text-center">JP</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp

                @foreach ($groups as $group)
                    @php
                        $materials = $training ? $training->materials->where('group_name', $group) : collect();
                    @endphp

                    @if ($materials->count())
                        <tr class="bg-gray-200 font-bold">
                            <td colspan="2" class="p-2">{{ $group }}</td>
                        </tr>

                        @foreach ($materials as $material)
                            <tr>
                                <td class="border p-2">{{ $material->title }}</td>
                                <td class="border p-2 text-center">{{ $material->jp }}</td>
                            </tr>
                            @php $total += (int) $material->jp; @endphp
                        @endforeach
                    @endif
                @endforeach

                <tr class="bg-yellow-400 font-bold">
                    <td class="p-2 text-right">JUMLAH</td>
                    <td class="p-2 text-center">{{ $total }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('registration.form') }}"
            class="px-6 py-3 bg-green-600 text-white rounded font-bold hover:bg-green-700 mt-6 inline-block">
            Daftar Sekarang
        </a>
    </div>
@endsection
