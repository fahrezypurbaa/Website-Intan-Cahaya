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
        <h2 class="text-3xl font-bold text-center text-[#144F5F] mb-12">📑 Dokumen Resmi & Sertifikat</h2>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            @php
                $legalitas = [
                    [
                        'title' => 'SK PJK3 Kemenaker',
                        'desc' =>
                            'Surat Keputusan Direktorat Jenderal Pembinaan Pengawasan Ketenagakerjaan Nomor 5/348/AS.02.00/III/2021.',
                        'file' => 'files/sk-pjk3.pdf',
                        'image' => 'images/sk-pjk3.jpg',
                    ],
                    [
                        'title' => 'Akta Pendirian Perusahaan',
                        'desc' => 'Dokumen resmi akta pendirian PT Intan Cahaya Mandiri.',
                        'file' => 'files/akta.pdf',
                        'image' => 'images/akta.jpg',
                    ],
                    [
                        'title' => 'NPWP Perusahaan',
                        'desc' => 'Nomor Pokok Wajib Pajak resmi perusahaan.',
                        'file' => 'files/npwp.pdf',
                        'image' => 'images/npwp.jpg',
                    ],
                    [
                        'title' => 'Sertifikat Kompetensi',
                        'desc' => 'Sertifikat akreditasi & kompetensi pendukung kegiatan pelatihan.',
                        'file' => 'files/sertifikat.pdf',
                        'image' => 'images/sertifikat.jpg',
                    ],
                ];
            @endphp

            @foreach ($legalitas as $doc)
                <div class="bg-white shadow rounded-xl overflow-hidden hover:shadow-lg transition">
                    <div class="relative">
                        <img src="{{ asset($doc['image']) }}" alt="{{ $doc['title'] }}"
                            class="h-48 w-full object-cover cursor-pointer doc-preview"
                            data-image="{{ asset($doc['image']) }}">
                        <div
                            class="absolute inset-0 bg-black/40 opacity-0 hover:opacity-100 flex items-center justify-center text-white transition">
                            🔍 Klik untuk perbesar
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-[#144F5F] mb-2">{{ $doc['title'] }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $doc['desc'] }}</p>
                        <a href="{{ asset($doc['file']) }}" target="_blank"
                            class="px-4 py-2 bg-[#73BA7D] text-white rounded shadow hover:bg-[#144F5F] transition">
                            📂 Lihat Dokumen
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Modal Preview Foto --}}
    <div id="docModal" class="hidden fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50">
        <button id="closeDocModal" class="absolute top-5 right-5 text-white text-3xl">&times;</button>
        <img id="docModalImg" src="" class="max-h-[80vh] max-w-[90vw] rounded-lg shadow-lg">
    </div>

@endsection
