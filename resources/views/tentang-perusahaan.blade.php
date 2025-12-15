@extends('layouts.app')

@section('title', 'Tentang Perusahaan Intan Safety Jogja | Profil, Visi Misi & Sejarah')

@section('meta_description', 'Profil lengkap PT Intan Cahaya Mandiri (Intan Safety Jogja) sebagai PJK3 resmi Kemenaker
    RI. Mengenal visi, misi, sejarah, dan komitmen kami dalam pelatihan K3.')

@section('canonical', url('/tentang-perusahaan'))

@section('content')
    <!-- ================= HERO / BANNER ================= -->
    <section class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}"
            alt="Profil Perusahaan Intan Safety Jogja sebagai PJK3 Kemenaker RI" class="w-full h-64 md:h-72 object-cover">

        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/90 to-[#73BA7D]/70"></div>

        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4">
            <h1 class="text-3xl md:text-4xl font-extrabold drop-shadow">
                Tentang Perusahaan Intan Safety
            </h1>
            <div class="w-20 h-1 bg-white mx-auto mt-3 mb-2 rounded"></div>
            <p class="mt-1 text-white/90 text-base md:text-lg">
                Penyedia Pelatihan & Konsultan K3 Terpercaya
            </p>
        </div>
    </section>

    <!-- ================= PROFIL PERUSAHAAN ================= -->
    <section class="max-w-7xl mx-auto px-4 py-12">
        <div class="flex flex-col items-center">
            <div class="relative w-full max-w-4xl">
                <img src="{{ asset('images/tim-kami.JPG') }}"
                    alt="Tim profesional Intan Safety Jogja dalam layanan pelatihan K3"
                    class="rounded-xl shadow-lg border-4 border-white w-full h-auto object-cover
                           max-h-[260px] sm:max-h-[340px] md:max-h-[420px] lg:max-h-[500px]">
                <div class="absolute inset-0 rounded-xl ring-4 ring-[#73BA7D]/40"></div>
            </div>

            <div class="mt-8 max-w-3xl text-gray-700 leading-relaxed space-y-4 text-center">
                <p>
                    <strong>PT Intan Cahaya Mandiri (Intan Safety Jogja)</strong> merupakan perusahaan yang bergerak di
                    bidang jasa pembinaan, pelatihan, dan konsultasi
                    <strong>Kesehatan dan Keselamatan Kerja (K3)</strong>.
                </p>
                <p>
                    Perusahaan ini telah resmi ditunjuk oleh
                    <strong>Kementerian Ketenagakerjaan Republik Indonesia</strong>
                    sebagai <strong>Perusahaan Jasa Pembinaan K3 (PJK3)</strong>
                    berdasarkan Surat Keputusan Direktorat Jenderal Pembinaan
                    Pengawasan Ketenagakerjaan
                    <strong>Nomor 5/348/AS.02.00/III/2021</strong>.
                </p>
                <p>
                    Dengan pengalaman bertahun-tahun dan tenaga ahli bersertifikat,
                    Intan Safety berkomitmen membantu perusahaan dan individu
                    meningkatkan kompetensi K3 demi terciptanya lingkungan kerja
                    yang aman, sehat, dan produktif.
                </p>
            </div>
        </div>
    </section>

    <!-- ================= VISI & MISI ================= -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-12">
            <div>
                <h2 class="text-2xl font-bold text-[#144F5F] mb-4">
                    Visi Perusahaan
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Menjadi perusahaan jasa pembinaan, pelatihan, dan konsultan
                    keselamatan dan kesehatan kerja yang profesional, jujur,
                    dan terpercaya dalam meningkatkan budaya K3 di Indonesia.
                </p>
            </div>

            <div class="relative pl-6">
                <div class="absolute top-0 bottom-0 left-0 w-1 bg-gradient-to-b from-[#73BA7D] to-[#144F5F] rounded"></div>
                <h2 class="text-2xl font-bold text-[#144F5F] mb-4">
                    Misi Perusahaan
                </h2>
                <ul class="space-y-3 text-gray-700">
                    <li>✔ Menjadi mitra strategis perusahaan dalam penerapan K3.</li>
                    <li>✔ Mendorong perilaku kerja aman dan sehat di lingkungan kerja.</li>
                    <li>✔ Menyediakan layanan pelatihan K3 berkualitas dan berstandar nasional.</li>
                    <li>✔ Mengembangkan SDM kompeten dan bersertifikat di bidang K3.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ================= SEJARAH PERUSAHAAN ================= -->
    <section class="max-w-6xl mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-[#144F5F] text-center mb-12">
            Sejarah Perusahaan Intan Safety
        </h2>

        <div class="relative border-l-4 border-[#73BA7D]/60 pl-8 space-y-10">
            @php
                $timeline = [
                    2021 => 'Berdirinya PT Intan Cahaya Mandiri cabang Yogyakarta pada 20 Agustus 2021 dengan fokus awal pelatihan K3 Kemenaker RI.',
                    2022 => 'Pengembangan program sertifikasi BNSP dan pelatihan non-sertifikasi, termasuk pelatihan online.',
                    2023 => 'Pertumbuhan jumlah klien dan event pelatihan secara signifikan.',
                    2024 => 'Mencapai lebih dari 800 alumni dari berbagai sektor industri.',
                    2025 => 'Berkomitmen meningkatkan mutu layanan dan inovasi pelatihan K3 berkelanjutan.',
                ];
            @endphp

            @foreach ($timeline as $year => $desc)
                <div class="relative">
                    <div
                        class="absolute -left-11 w-8 h-8 bg-gradient-to-r from-[#144F5F] to-[#73BA7D]
                               rounded-full flex items-center justify-center text-white font-bold text-sm">
                        {{ substr($year, 2) }}
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-xl font-bold text-[#144F5F] mb-2">{{ $year }}</h3>
                        <p class="text-gray-700">{{ $desc }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
