@extends('layouts.app')

@section('title', 'Legalitas - Intan Safety')

@section('content')

    {{-- Banner Responsif --}}
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Legalitas"
            class="w-full h-48 sm:h-56 md:h-64 lg:h-72 xl:h-80 object-cover rounded-none md:rounded-lg shadow-md">
        <div
            class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/70 to-[#73BA7D]/70 flex items-center justify-center text-center px-4">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white drop-shadow">
                LEGALITAS PERUSAHAAN
            </h1>
        </div>
    </div>

    {{-- Konten Utama --}}
    <div class="max-w-6xl mx-auto px-4 sm:px-6 md:px-8 py-8 sm:py-10 md:py-12">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-[#144F5F] mb-10 sm:mb-12">
            📑 Dokumen Resmi & Sertifikat
        </h2>

        {{-- Grid Responsif --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @php
                $legalitas = [
                    [
                        'title' => 'Nomor Induk Berusaha (NIB)',
                        'desc' => 'Dokumen resmi identitas pelaku usaha yang diterbitkan oleh OSS (Online Single Submission).',
                        'file' => 'files/nib.pdf',
                        'image' => 'images/nib.jpeg',
                    ],
                    [
                        'title' => 'Surat Keterangan Domisili Perusahaan (SKDP)',
                        'desc' => 'Surat resmi dari Pemerintah Desa Trihanggo yang menyatakan alamat domisili perusahaan.',
                        'file' => 'files/domisili.pdf',
                        'image' => 'images/domisili.jpeg',
                    ],
                    [
                        'title' => 'Rekening Bank Perusahaan',
                        'desc' => 'Bukti kepemilikan rekening perusahaan atas nama PT Intan Cahaya Mandiri di Bank Mandiri.',
                        'file' => 'files/rekening.pdf',
                        'image' => 'images/rekening.jpeg',
                    ],
                    [
                        'title' => 'Surat Keputusan Penunjukan Kepala Cabang',
                        'desc' => 'Surat resmi yang menunjuk Kepala Kantor Cabang Yogyakarta PT Intan Cahaya Mandiri.',
                        'file' => 'files/sk-cabang.pdf',
                        'image' => 'images/sk-cabang.jpeg',
                    ],
                    [
                        'title' => 'Pengesahan Perubahan Anggaran Dasar – Kemenkumham',
                        'desc' => 'Surat dari Kemenkumham tentang pengesahan perubahan anggaran dasar PT Intan Cahaya Mandiri.',
                        'file' => 'files/kemenkumham.pdf',
                        'image' => 'images/kemenkumham.jpeg',
                    ],
                ];
            @endphp

            @foreach ($legalitas as $doc)
                <div
                    class="bg-white shadow-md hover:shadow-xl rounded-xl overflow-hidden transition-all duration-300 flex flex-col">
                    {{-- Gambar --}}
                    <div class="relative w-full h-44 sm:h-48 md:h-56">
                        <img src="{{ asset($doc['image']) }}" alt="{{ $doc['title'] }}"
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>

                    {{-- Konten --}}
                    <div class="p-4 sm:p-5 flex flex-col flex-grow justify-between">
                        <div>
                            <h3 class="font-bold text-base sm:text-lg text-[#144F5F] mb-2">
                                {{ $doc['title'] }}
                            </h3>
                            <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-4">
                                {{ $doc['desc'] }}
                            </p>
                        </div>

                        {{-- Tombol --}}
                        <button data-image="{{ asset($doc['image']) }}"
                            class="lihat-gambar mt-auto px-3 py-2 sm:px-4 sm:py-2 bg-[#73BA7D] text-white text-sm sm:text-base rounded-md shadow hover:bg-[#144F5F] transition duration-300 w-full">
                            📂 Lihat Dokumen
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Modal Gambar --}}
    <div id="docModal"
        class="hidden fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 p-4">
        <button id="closeDocModal"
            class="absolute top-4 right-4 sm:top-6 sm:right-6 text-white text-3xl sm:text-4xl font-bold">&times;</button>
        <img id="docModalImg"
            class="max-h-[75vh] sm:max-h-[80vh] max-w-full sm:max-w-[90vw] rounded-lg shadow-lg object-contain">
    </div>

@endsection
