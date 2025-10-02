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

<div class="max-w-7xl mx-auto py-12 px-4 grid grid-cols-1 md:grid-cols-2 gap-8">

    {{-- Gambar --}}
    <div>
        @if ($training && $training->image)
            <img src="{{ asset('storage/' . $training->image) }}" 
                 class="w-full h-[600px] object-cover rounded-xl shadow-lg border border-gray-100">
        @endif
    </div>

    {{-- Detail --}}
    <div class="flex flex-col">
        <h1 class="text-3xl font-extrabold text-[#144F5F] mb-3 border-b-4 border-gradient-to-r from-[#144F5F] to-[#73BA7D] inline-block pb-1">
            {{ $training->title ?? '-' }}
        </h1>
        <p class="text-gray-600 mb-6">{{ $training->description ?? '' }}</p>

        <ul class="space-y-2 text-gray-700 text-sm mb-6">
            @if (!empty($training->duration))
                <li>🗓 Durasi: <span class="font-semibold">{{ $training->duration }}</span></li>
            @endif
            @if (!empty($training->mode))
                <li>📌 Metode: <span class="font-semibold">{{ $training->mode }}</span></li>
            @endif
            <li>📂 Kategori: <span class="font-semibold">{{ $training->category->name ?? '-' }}</span></li>
            @if (!empty($training->requirement))
                <li>🎓 Persyaratan: {{ $training->requirement }}</li>
            @endif
        </ul>

        {{-- Tombol utama --}}
        <div class="flex gap-4 mb-8">
            <a href="{{ route('registration.form') }}"
               class="px-6 py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] 
                      text-white rounded-lg font-bold shadow hover:shadow-lg hover:scale-105 transition">
               🚀 Daftar Sekarang
            </a>
            <a href="/brosur/{{ $training->slug }}.pdf"
               class="px-6 py-3 border-2 border-[#144F5F] text-[#144F5F] rounded-lg font-semibold 
                      hover:bg-gradient-to-r hover:from-[#144F5F] hover:to-[#73BA7D] hover:text-white transition">
               📄 Download Brosur
            </a>
        </div>

        {{-- Benefit --}}
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-6 rounded-xl shadow-md mb-8">
            <h3 class="text-xl font-bold text-[#144F5F] mb-4">Fasilitas & Benefit</h3>
            <ul class="grid grid-cols-2 gap-3 text-sm text-gray-700">
                <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-gradient-to-r from-[#144F5F] to-[#73BA7D]"></span> Sertifikat Kemnaker</li>
                <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-gradient-to-r from-[#144F5F] to-[#73BA7D]"></span> Modul Pelatihan</li>
                <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-gradient-to-r from-[#144F5F] to-[#73BA7D]"></span> Lunch & Coffee Break</li>
                <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-gradient-to-r from-[#144F5F] to-[#73BA7D]"></span> Souvenir Eksklusif</li>
                <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-gradient-to-r from-[#144F5F] to-[#73BA7D]"></span> Dokumentasi Kegiatan</li>
                <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-gradient-to-r from-[#144F5F] to-[#73BA7D]"></span> Goodiebag & Polo Shirt</li>
            </ul>
        </div>

        {{-- Accordion --}}
        <div x-data="{ openRundown: false, openMateri: false }" class="space-y-4">

            {{-- Rundown --}}
            <div class="border rounded-xl shadow overflow-hidden">
                <button @click="openRundown = !openRundown" 
                        class="w-full flex justify-between items-center px-4 py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white font-semibold">
                    <span>📅 Rundown Training</span>
                    <span x-text="openRundown ? '-' : '+'"></span>
                </button>
                <div x-show="openRundown" x-transition class="p-4 bg-white">
                    @if ($training->rundowns->count())
                        <table class="min-w-full border text-sm">
                            <thead class="bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white">
                                <tr>
                                    <th class="py-2 px-3 text-left">Hari</th>
                                    <th class="py-2 px-3 text-left">Pukul</th>
                                    <th class="py-2 px-3 text-left">Instruktur</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($training->rundowns as $rundown)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-3 py-2">Hari - {{ $rundown->day }}</td>
                                        <td class="px-3 py-2">{{ $rundown->time }}</td>
                                        <td class="px-3 py-2">{{ $rundown->instructor ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-500">Belum ada data rundown.</p>
                    @endif
                </div>
            </div>

            {{-- Materi --}}
            <div class="border rounded-xl shadow overflow-hidden">
                <button @click="openMateri = !openMateri" 
                        class="w-full flex justify-between items-center px-4 py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white font-semibold">
                    <span>📘 Materi Pembinaan</span>
                    <span x-text="openMateri ? '-' : '+'"></span>
                </button>
                <div x-show="openMateri" x-transition class="p-4 bg-white">
                    @php $total = 0; @endphp
                    <table class="w-full border-collapse border text-sm">
                        <thead>
                            <tr class="bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white">
                                <th class="p-2 text-left">Materi</th>
                                <th class="p-2 w-20 text-center">JP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                                @php $materials = $training ? $training->materials->where('group_name', $group) : collect(); @endphp
                                @if ($materials->count())
                                    <tr class="bg-gray-100 font-bold">
                                        <td colspan="2" class="p-2">{{ $group }}</td>
                                    </tr>
                                    @foreach ($materials as $material)
                                        <tr class="hover:bg-gray-50">
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
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
