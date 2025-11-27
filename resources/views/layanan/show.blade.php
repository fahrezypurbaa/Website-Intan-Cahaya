@extends('layouts.app')

@section('content')
    @php
        $groups = $groups ?? [
            'Kelompok Dasar',
            'Kelompok Inti',
            'Kelompok Penunjang',
            'Praktek Pemeriksaan',
            'Evaluasi',
        ];
        $training = $training ?? null;
    @endphp

    <div class="max-w-7xl mx-auto py-12 px-4 grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- Gambar + Materi --}}
        <div class="flex flex-col">
            @if ($training && $training->image)
                <div class="w-full flex justify-center items-center mb-6">
                    <img src="{{ asset('storage/' . $training->image) }}" alt="{{ $training->title }}"
                        class="w-full max-h-[500px] object-contain rounded-2xl shadow-md border border-gray-200">
                </div>
            @endif


            {{-- Rundown --}}
            <div x-data="{ openRundown: false }" class="space-y-4">
                <div class="border rounded-xl shadow overflow-hidden">
                    <button @click="openRundown = !openRundown"
                        class="w-full flex justify-between items-center px-4 py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white font-semibold">
                        <span class="flex items-center gap-2">
                            <x-heroicon-o-calendar class="w-5 h-5" />
                            Rundown Training
                        </span>
                        <span x-text="openRundown ? '-' : '+'"></span>
                    </button>
                    <div x-show="openRundown" x-transition class="p-4 bg-white overflow-x-auto">
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
            </div>
            <br>

            {{-- Materi Pembinaan --}}
            {{-- Materi Pembinaan --}}
            <div x-data="{ openMateri: false }" class="border rounded-xl shadow overflow-hidden">
                <button @click="openMateri = !openMateri"
                    class="w-full flex justify-between items-center px-4 py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white font-semibold">
                    <span class="flex items-center gap-2">
                        <x-heroicon-o-book-open class="w-5 h-5" />
                        Materi Pembinaan
                    </span>
                    <span x-text="openMateri ? '-' : '+'"></span>
                </button>

                <div x-show="openMateri" x-transition class="p-4 bg-white overflow-x-auto">
                    @php
                        $category = strtolower($training->category->slug ?? '');
                    @endphp

                    @if ($category === 'kemnaker')
                        {{-- FORMAT KEMNAKER --}}
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
                                    @php $materials = $training->materials->where('group_name', $group); @endphp
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
                    @elseif ($category === 'bnsp')
                        {{-- FORMAT BNSP & PPSDM MIGAS --}}
                        <table class="w-full border-collapse border text-sm">
                            <thead>
                                <tr class="bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white">
                                    <th class="p-2 text-left w-40">Kode Unit</th>
                                    <th class="p-2 text-left">Judul Uji Kompetensi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($training->materials as $material)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border p-2">{{ $material->kode_unit ?? '-' }}</td>
                                        <td class="border p-2">{{ $material->title }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @elseif ($category === 'non-sertifikasi')
                        {{-- FORMAT NON SERTIFIKASI: HANYA JUDUL --}}
                        <table class="w-full border-collapse border text-sm">
                            <thead>
                                <tr class="bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white">
                                    <th class="p-2 text-left">Judul Materi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($training->materials as $material)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border p-2">{{ $material->title }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>

        </div>

        {{-- Detail --}}
        <div class="flex flex-col">
            <h1
                class="text-2xl md:text-3xl font-extrabold text-[#144F5F] mb-3 border-b-4 border-gradient-to-r from-[#144F5F] to-[#73BA7D] inline-block pb-1">
                {{ $training->title ?? '-' }}
            </h1>
            <p class="text-gray-600 mb-6">{{ $training->description ?? '' }}</p>

            {{-- Tombol --}}
            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                <a href="{{ route('registration.form') }}"
                    class="px-6 py-3 text-center bg-gradient-to-r from-[#144F5F] to-[#73BA7D] 
                      text-white rounded-lg font-bold shadow hover:shadow-lg hover:scale-105 transition flex items-center justify-center gap-2">
                    <x-heroicon-o-rocket-launch class="w-5 h-5" />
                    Daftar Sekarang
                </a>

                {{-- PDF --}}
                @if ($training->brochure_path)
                    <a href="{{ route('trainings.brochure', $training->id) }}"
                        class="px-6 py-3 text-center border-2 border-[#144F5F] text-[#144F5F] rounded-lg font-semibold 
        hover:bg-gradient-to-r hover:from-[#144F5F] hover:to-[#73BA7D] hover:text-white transition flex items-center justify-center gap-2">
                        <x-heroicon-o-document-text class="w-5 h-5" />
                        Download PDF
                    </a>
                @else
                    <button disabled
                        class="px-6 py-3 text-center border-2 border-gray-300 text-gray-400 rounded-lg font-semibold 
        flex items-center justify-center gap-2 cursor-not-allowed bg-gray-50">
                        <x-heroicon-o-document-text class="w-5 h-5 text-gray-400" />
                        PDF Belum Tersedia
                    </button>
                @endif


            </div>

            {{-- Info --}}
            <ul class="space-y-2 text-gray-700 text-sm mb-6">
                @if (!empty($training->duration))
                    <li class="flex items-center gap-2">
                        <x-heroicon-o-calendar class="w-5 h-5 text-[#144F5F]" />
                        <span>Durasi: <span class="font-semibold">{{ $training->duration }}</span></span>
                    </li>
                @endif
                @if (!empty($training->mode))
                    <li class="flex items-center gap-2">
                        <x-heroicon-o-map-pin class="w-5 h-5 text-[#144F5F]" />
                        <span>Metode: <span class="font-semibold">{{ $training->mode }}</span></span>
                    </li>
                @endif
                <li class="flex items-center gap-2">
                    <x-heroicon-o-folder class="w-5 h-5 text-[#144F5F]" />
                    <span>Kategori: <span class="font-semibold">{{ $training->category->name ?? '-' }}</span></span>
                </li>
            </ul>

            {{-- Persyaratan --}}
            @if (!empty($training->requirement))
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-6 rounded-xl shadow-md mb-6">
                    <h3 class="text-xl font-bold text-[#144F5F] mb-4 flex items-center gap-2">
                        <x-heroicon-o-academic-cap class="w-6 h-6" />
                        Persyaratan Peserta
                    </h3>

                    @php
                        $requirements = preg_split('/\r\n|\r|\n/', $training->requirement);
                    @endphp

                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm text-gray-700">
                        @foreach ($requirements as $req)
                            @if (trim($req))
                                <li class="flex items-start gap-3">
                                    <!-- Bullet warna gradasi (tetap muncul) -->
                                    <span
                                        class="w-2 h-2 mt-1 flex-shrink-0 rounded-full 
                                     bg-gradient-to-r from-[#144F5F] to-[#73BA7D]">
                                    </span>

                                    <!-- Teks rapi dan justify -->
                                    <span class="text-justify leading-relaxed">
                                        {{ trim($req) }}
                                    </span>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                </div>
            @endif

            {{-- Benefit --}}
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-6 rounded-xl shadow-md mb-8">
                <h3 class="text-xl font-bold text-[#144F5F] mb-4">Fasilitas & Benefit</h3>
                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-gray-700">
                    <li class="flex items-center gap-2"><span
                            class="w-2 h-2 rounded-full bg-gradient-to-r from-[#144F5F] to-[#73BA7D]"></span> Sertifikat
                        Kemnaker</li>
                    <li class="flex items-center gap-2"><span
                            class="w-2 h-2 rounded-full bg-gradient-to-r from-[#144F5F] to-[#73BA7D]"></span> Modul
                        Pelatihan</li>
                    <li class="flex items-center gap-2"><span
                            class="w-2 h-2 rounded-full bg-gradient-to-r from-[#144F5F] to-[#73BA7D]"></span> Lunch & Coffee
                        Break</li>
                    <li class="flex items-center gap-2"><span
                            class="w-2 h-2 rounded-full bg-gradient-to-r from-[#144F5F] to-[#73BA7D]"></span> Souvenir
                        Eksklusif</li>
                    <li class="flex items-center gap-2"><span
                            class="w-2 h-2 rounded-full bg-gradient-to-r from-[#144F5F] to-[#73BA7D]"></span> Dokumentasi
                        Kegiatan</li>
                    <li class="flex items-center gap-2"><span
                            class="w-2 h-2 rounded-full bg-gradient-to-r from-[#144F5F] to-[#73BA7D]"></span> Goodiebag &
                        Polo Shirt</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
