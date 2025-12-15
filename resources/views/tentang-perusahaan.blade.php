@extends('layouts.app')

@section('title', 'Tentang Perusahaan Intan Safety Jogja | Profil, Visi, Misi & Sejarah')

@section('meta')
    <meta name="description"
        content="Profil lengkap PT Intan Cahaya Mandiri (Intan Safety Jogja) sebagai PJK3 resmi Kemenaker RI. Mengenal visi, misi, sejarah, serta komitmen kami dalam pelatihan dan konsultasi K3.">
    <link rel="canonical" href="{{ url('/tentang-perusahaan') }}">
@endsection

@section('content')

    {{-- ================= HERO ================= --}}
    <section class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}"
            alt="Profil Perusahaan Intan Safety Jogja sebagai PJK3 resmi Kemenaker RI"
            width="1920" height="450"
            class="w-full h-64 md:h-72 object-cover">

        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/90 to-[#73BA7D]/70"></div>

        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4">
            <h1 class="text-3xl md:text-4xl font-extrabold drop-shadow">
                Tentang Perusahaan Intan Safety
            </h1>
            <p class="mt-3 text-white/90 text-base md:text-lg max-w-xl">
                Profil perusahaan penyedia pelatihan, sertifikasi, dan konsultasi
                Keselamatan dan Kesehatan Kerja (K3) terpercaya di Indonesia.
            </p>
        </div>
    </section>

    {{-- ================= PROFIL PERUSAHAAN ================= --}}
    <section class="max-w-7xl mx-auto px-4 py-14">
        <div class="flex flex-col items-center">

            <div class="relative w-full max-w-4xl">
                <img src="{{ asset('images/tim-kami.JPG') }}"
                    alt="Tim profesional Intan Safety Jogja dalam layanan pelatihan dan konsultasi K3"
                    width="1200" height="800"
                    class="rounded-xl shadow-lg border-4 border-white w-full h-auto object-cover
                           max-h-[260px] sm:max-h-[340px] md:max-h-[420px] lg:max-h-[500px]">
            </div>

            <div class="mt-10 max-w-3xl text-gray-700 leading-relaxed space-y-5 text-center">
                <p>
                    <strong>PT Intan Cahaya Mandiri (Intan Safety Jogja)</strong>
                    merupakan perusahaan yang bergerak di bidang jasa pembinaan,
                    pelatihan, dan konsultasi <strong>Kesehatan dan Keselamatan Kerja (K3)</strong>.
                </p>

                <p>
                    Perusahaan ini telah resmi ditunjuk oleh
                    <strong>Kementerian Ketenagakerjaan Republik Indonesia</strong>
                    sebagai <strong>Perusahaan Jasa Pembinaan K3 (PJK3)</strong>
                    berdasarkan SK Dirjen Binwasnaker
                    <strong>No. 5/348/AS.02.00/III/2021</strong>.
                </p>

                <p>
                    Dengan tenaga ahli bersertifikat dan pengalaman bertahun-tahun,
                    Intan Safety berkomitmen membantu perusahaan dan individu
                    meningkatkan kompetensi K3 demi terciptanya lingkungan kerja
                    yang aman, sehat, dan produktif.
                </p>
            </div>
        </div>
    </section>

    {{-- ================= VISI & MISI ================= --}}
    <section class="bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-12">

            <div>
                <h2 class="text-2xl font-bold text-[#144F5F] mb-4">
                    Visi Perusahaan Intan Safety
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Menjadi perusahaan jasa pembinaan, pelatihan, dan konsultan
                    keselamatan dan kesehatan kerja yang profesional, jujur,
                    serta terpercaya dalam membangun budaya K3 di Indonesia.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#144F5F] mb-4">
                    Misi Perusahaan Intan Safety
                </h2>
                <ul class="space-y-3 text-gray-700 list-disc pl-5">
                    <li>Mendampingi perusahaan dalam penerapan sistem K3.</li>
                    <li>Mendorong perilaku kerja aman dan sehat.</li>
                    <li>Menyediakan pelatihan K3 berstandar nasional.</li>
                    <li>Mengembangkan SDM K3 yang kompeten dan bersertifikat.</li>
                </ul>
            </div>
        </div>
    </section>

    {{-- ================= SEJARAH ================= --}}
    <section class="max-w-6xl mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-[#144F5F] text-center mb-12">
            Sejarah Perusahaan Intan Safety
        </h2>

        <div class="relative border-l-4 border-[#73BA7D]/60 pl-8 space-y-10">
            @foreach ([
                2021 => 'Berdirinya PT Intan Cahaya Mandiri cabang Yogyakarta dengan fokus pelatihan K3 Kemenaker RI.',
                2022 => 'Pengembangan program sertifikasi BNSP dan pelatihan non-sertifikasi.',
                2023 => 'Pertumbuhan jumlah klien dan kegiatan pelatihan nasional.',
                2024 => 'Mencapai lebih dari 800 alumni dari berbagai sektor industri.',
                2025 => 'Komitmen peningkatan mutu layanan dan inovasi pelatihan K3.'
            ] as $year => $desc)
                <div>
                    <h3 class="text-xl font-bold text-[#144F5F] mb-2">{{ $year }}</h3>
                    <p class="text-gray-700">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </section>

@endsection
