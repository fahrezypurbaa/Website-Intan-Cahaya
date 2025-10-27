@extends('layouts.app')

@section('title', 'Tentang Perusahaan - Intan Safety')

@section('content')
    <!-- Hero / Banner -->
    <section class="relative">
        <!-- Background Foto -->
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Tentang Perusahaan"
            class="w-full h-64 md:h-72 object-cover">

        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/90 to-[#73BA7D]/70"></div>

        <!-- Konten -->
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4">
            <h1 class="text-3xl md:text-4xl font-extrabold drop-shadow">
                Tentang Perusahaan
            </h1>
            <div class="w-20 h-1 bg-white mx-auto mt-3 mb-2 rounded"></div>
            <p class="mt-1 text-white/90 text-base md:text-lg">
                #Safety, Quality & Competent
            </p>
        </div>
    </section>

    <!-- Foto Tim + Deskripsi -->
    <section class="max-w-7xl mx-auto px-4 py-12">
        <div class="flex flex-col items-center">
            <div class="relative w-full max-w-4xl">
                <img src="{{ asset('images/tim-kami.JPG') }}" alt="Tim Perusahaan"
                    class="rounded-xl shadow-lg border-4 border-white w-full h-auto object-cover 
                            max-h-[260px] sm:max-h-[340px] md:max-h-[420px] lg:max-h-[500px]">
                <div class="absolute inset-0 rounded-xl ring-4 ring-[#73BA7D]/40"></div>
            </div>
            <p class="mt-8 text-center text-gray-700 max-w-3xl leading-relaxed px-2">
                PT Intan Cahaya Mandiri telah resmi ditunjuk oleh Kementerian Tenaga Kerja Republik Indonesia
                sebagai Perusahaan Jasa Pembinaan Kesehatan dan Keselamatan Kerja (PJK3) melalui surat keputusan
                Direktorat Jenderal Pembinaan Pengawasan Ketenagakerjaan terbaru
                <strong>Nomor 5/348/AS.02.00/III/2021</strong>.
            </p>
        </div>
    </section>

    <!-- Visi & Misi -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-12">
            <!-- Visi -->
            <div>
                <h2 class="text-2xl font-bold text-[#144F5F] flex items-center gap-2 mb-4">
                    <i class="fa-solid fa-star text-[#73BA7D]"></i> Visi
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Menjadi perusahaan jasa pembinaan, pelatihan dan konsultan keselamatan dan kesehatan kerja,
                    yang jujur dan terpercaya sehingga mampu merubah keadaan yang lebih baik pada pelanggan
                    dan partner.
                </p>
            </div>

            <!-- Misi -->
            <div class="relative pl-6">
                <div class="absolute top-0 bottom-0 left-0 w-1 bg-gradient-to-b from-[#73BA7D] to-[#144F5F] rounded"></div>
                <h2 class="text-2xl font-bold text-[#144F5F] flex items-center gap-2 mb-4">
                    <i class="fa-solid fa-bullseye text-[#73BA7D]"></i> Misi
                </h2>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-2">
                        <span class="text-[#73BA7D]">✔</span> Menjadi mitra terpercaya bagi semua perusahaan yang peduli
                        akan manfaat K3.
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-[#73BA7D]">✔</span> Mendorong berperilaku aman dan sehat di lingkungan kerja.
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-[#73BA7D]">✔</span> Memberikan pelayanan berkualitas dengan komitmen profesional.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Sejarah Perusahaan -->
    <section class="max-w-6xl mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-[#144F5F] text-center mb-12">Sejarah Perusahaan</h2>

        <!-- Timeline -->
        <div class="relative border-l-4 border-[#73BA7D]/60 pl-8 space-y-10">
            <div class="absolute left-[-10px] top-0 w-5 h-5 bg-[#144F5F] rounded-full"></div>
            <div class="absolute left-[-10px] bottom-0 w-5 h-5 bg-[#73BA7D] rounded-full"></div>

            @php
                $timeline = [
                    2021 => 'Intan Cahaya Mandiri cabang Yogyakarta berdiri di tanggal 20 Agustus 2021, berfokus pada pelatihan juru las dan pesawat angkat angkut Kemenaker RI.',
                    2022 => 'Mulai mencari formulasi baru untuk sertifikasi BNSP dan Non Sertifikasi, termasuk Online Training.',
                    2023 => 'Optimis dengan bertambahnya jumlah event pelatihan dan client, membuat perusahaan semakin berkembang.',
                    2024 => 'Inovasi kegiatan pelatihan lebih variatif, mencapai lebih dari 800 alumni.',
                    2025 => 'Terus meningkatkan kualitas layanan agar menjadi penyedia pelatihan terpercaya, unggul, dan berkualitas.',
                ];
            @endphp

            @foreach ($timeline as $year => $desc)
                <div class="relative">
                    <div
                        class="absolute -left-11 w-8 h-8 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] rounded-full flex items-center justify-center text-white font-bold text-sm">
                        {{ substr($year, 2) }}
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                        <h3 class="text-xl font-bold text-[#144F5F] mb-2">{{ $year }}</h3>
                        <p class="text-gray-700">{{ $desc }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
