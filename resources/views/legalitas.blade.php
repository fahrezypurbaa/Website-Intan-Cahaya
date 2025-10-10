@extends('layouts.app')

@section('title', 'Legalitas - Intan Safety')

@section('content')

    {{-- Banner --}}
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Legalitas"
            class="w-full h-64 object-cover rounded-lg shadow-md">
        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/70 to-[#73BA7D]/70 flex items-center justify-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow">
                LEGALITAS PERUSAHAAN
            </h1>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-center text-[#144F5F] mb-12 flex items-center justify-center gap-2">
            <i class="fa-solid fa-folder-open text-[#144F5F]"></i>
            Dokumen Resmi & Sertifikat
        </h2>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
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
                <div class="bg-white shadow rounded-xl overflow-hidden hover:shadow-lg transition">
                    <div class="relative">
                        <img src="{{ asset($doc['image']) }}" alt="{{ $doc['title'] }}"
                            class="h-48 w-full object-cover">
                    </div>

                    <div class="p-4">
                        <h3 class="font-bold text-lg text-[#144F5F] mb-2">{{ $doc['title'] }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $doc['desc'] }}</p>

                        {{-- Tombol Lihat Gambar --}}
                        <button data-image="{{ asset($doc['image']) }}"
                            class="lihat-gambar flex items-center gap-2 px-4 py-2 bg-[#73BA7D] text-white rounded shadow hover:bg-[#144F5F] transition">
                            <i class="fa-solid fa-folder-open"></i>
                            Lihat Dokumen
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Modal Preview Foto --}}
    <div id="docModal"
        class="hidden fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50">
        <button id="closeDocModal" class="absolute top-5 right-5 text-white text-3xl">&times;</button>
        <img id="docModalImg" src="" class="max-h-[80vh] max-w-[90vw] rounded-lg shadow-lg">
    </div>

@endsection
