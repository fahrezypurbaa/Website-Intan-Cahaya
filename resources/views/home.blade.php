@extends('layouts.app')

@section('title', 'Home - Intan Safety')

@section('meta_description',
    'Intan Safety adalah pusat pelatihan dan sertifikasi K3, BNSP, dan Kemnaker RI yang
    berpengalaman mendukung peningkatan kompetensi tenaga kerja.')

@section('content')

    <!-- Hero Section -->
    <div x-data="{ activeSlide: 0, slides: 3 }" x-init="setInterval(() => { activeSlide = (activeSlide + 1) % slides }, 8000)"
        class="relative w-full min-h-[100svh] md:min-h-screen h-auto overflow-hidden">

        <!-- Wrapper Slides -->
        <div class="flex min-h-[100svh] md:min-h-screen transition-transform duration-700 ease-in-out"
            :style="`transform: translateX(-${activeSlide * 100}%)`">

            <!-- ================= SLIDE 1 ================= -->
            <div class="w-full flex-shrink-0 relative min-h-[100svh] md:min-h-screen h-auto">
                <div class="absolute inset-0">
                    <img src="{{ asset('images/Kolase 2.jpg') }}"
                        alt="Pelatihan dan Sertifikasi K3, BNSP, dan Kemnaker RI oleh Intan Safety"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-black/60"></div>
                </div>

                <div
                    class="relative min-h-[100svh] md:min-h-screen
                flex flex-col items-center justify-start md:justify-center
                px-4 py-20 md:py-0 text-center">

                    <h1
                        class="text-4xl md:text-6xl font-extrabold
                    bg-gradient-to-r from-white via-gray-200 to-gray-100
                    bg-clip-text text-transparent
                    drop-shadow-[0_4px_10px_rgba(0,0,0,0.8)]
                    tracking-wide leading-tight">
                        Pusat Pelatihan & Sertifikasi
                    </h1>

                    <p class="mt-6 max-w-3xl text-base md:text-xl text-white/90">
                        Intan Safety menyediakan layanan pelatihan dan sertifikasi resmi yang dirancang untuk
                        meningkatkan kompetensi tenaga kerja di berbagai sektor industri melalui standar nasional
                        dan praktik terbaik.
                    </p>

                    <p
                        class="mt-4 text-lg md:text-2xl font-medium
                    text-white drop-shadow-[0_2px_6px_rgba(0,0,0,0.7)]">
                        Program Kemnaker RI, BNSP & Pengembangan Soft Skill
                    </p>

                    <div class="mt-8 flex flex-col sm:flex-row items-center gap-4">
                        <a href="/layanan"
                            class="px-6 py-3 rounded-xl text-lg text-white
                        bg-gradient-to-r from-[#144F5F] to-[#73BA7D]
                        shadow-lg transition-all duration-300
                        hover:scale-[1.05] hover:shadow-2xl hover:brightness-110">
                            Lihat Program Pelatihan & Sertifikasi
                        </a>

                        <a href="/registration"
                            class="px-6 py-3 rounded-xl text-lg text-white
                        bg-gradient-to-r from-[#144F5F] to-[#73BA7D]
                        shadow-lg transition-all duration-300
                        hover:scale-[1.05] hover:shadow-2xl hover:brightness-110">
                            Daftar Pelatihan Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- ================= SLIDE 2 ================= -->
            <div class="w-full flex-shrink-0 relative min-h-[100svh] md:min-h-screen h-auto">
                <div class="absolute inset-0">
                    <img src="{{ asset('images/2.png') }}" alt="Pencapaian dan pengalaman Intan Safety dalam pelatihan K3"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-black/70"></div>
                </div>

                <div class="relative min-h-[100svh] md:min-h-screen
                flex flex-col items-center justify-start md:justify-center
                px-6 py-20 md:py-0 text-white"
                    x-data="{ show: false }" x-init="$watch('activeSlide', v => show = (v === 1))">

                    <h2 x-show="show" x-transition.duration.700ms
                        class="text-3xl md:text-5xl font-extrabold mb-6 text-center
                    bg-gradient-to-r from-white via-gray-200 to-gray-100 bg-clip-text text-transparent">
                        Pencapaian dan Kepercayaan Klien Kami
                    </h2>

                    <p class="max-w-3xl text-center text-white/80 mb-10">
                        Selama bertahun-tahun, Intan Safety telah dipercaya oleh ribuan peserta dan ratusan perusahaan
                        dalam penyelenggaraan pelatihan dan sertifikasi yang berkualitas.
                    </p>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 w-full max-w-5xl">

                        <template
                            x-for="(card, index) in [
                            {label:'Alumni Pelatihan',target:4000,suffix:'+'},
                            {label:'Program Pembinaan',target:352,suffix:''},
                            {label:'Pelanggan Setia',target:500,suffix:'+'},
                            {label:'Perusahaan Mitra',target:352,suffix:''}
                        ]"
                            :key="index">
                            <div x-show="show" x-transition.duration.700ms.delay.200ms
                                class="bg-white/10 backdrop-blur-md border border-white/20 
                            rounded-2xl p-6 text-center transform transition duration-500 
                            hover:-translate-y-2 hover:shadow-[0_8px_25px_rgba(255,255,255,0.2)]">
                                <div x-data="{ count: 0 }" x-init="$watch('show', val => {
                                    if (val) {
                                        let target = card.target;
                                        let interval = setInterval(() => {
                                            if (count < target) {
                                                count += Math.ceil(target / 100);
                                            } else {
                                                count = target;
                                                clearInterval(interval);
                                            }
                                        }, 30);
                                    } else {
                                        count = 0;
                                    }
                                })">
                                    <p class="text-3xl md:text-4xl font-extrabold text-white" x-text="count + card.suffix">
                                    </p>
                                </div>
                                <p class="mt-2 text-sm md:text-lg text-gray-200" x-text="card.label"></p>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- ================= SLIDE 3 ================= -->
            <div class="w-full flex-shrink-0 relative min-h-[100svh] md:min-h-screen h-auto">
                <div class="absolute inset-0">
                    <img src="{{ asset('images/Kolase 1.jpg') }}"
                        alt="Layanan konsultasi dan pusat pelatihan keselamatan kerja Intan Safety"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-black/70"></div>
                </div>

                <div
                    class="relative min-h-[100svh] md:min-h-screen
                flex items-start md:items-center justify-center
                px-4 py-20 md:py-0">

                    <div class="w-full max-w-xl mx-auto">

                        <div
                            class="bg-white/20 backdrop-blur-xl border border-white/30 
                        rounded-2xl shadow-2xl p-6 lg:p-8">
                            <!-- H2 SEO -->
                            <h2
                                class="text-2xl font-bold mb-4 text-center 
                            bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent">
                                Hubungi Tim Intan Safety
                            </h2>

                            <!-- Paragraf Kontekstual -->
                            <p class="text-sm text-white/80 text-center mb-6">
                                Konsultasikan kebutuhan pelatihan dan sertifikasi Anda bersama tim profesional
                                Intan Safety untuk solusi yang tepat dan terpercaya.
                            </p>

                            <div class="space-y-4">

                                <!-- Telepon -->
                                <div
                                    class="flex items-center p-4 rounded-xl bg-white/10 hover:bg-white/20 
                                border border-white/20 transition shadow-md">
                                    <div class="bg-gradient-to-r from-[#144F5F] to-[#73BA7D] p-3 rounded-full mr-4">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.5a1 1 0 01-.5 1.21l-2.26 1.13a11 11 0 005.52 5.52l1.13-2.26a1 1 0 011.21-.5l4.5 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.7 21 3 14.3 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-gray-200">Telepon</p>
                                        <p class="text-base font-medium text-white">(+62) 821-4613-4846</p>
                                    </div>
                                </div>

                                <!-- Alamat -->
                                <div
                                    class="flex items-start p-4 rounded-xl bg-white/10 hover:bg-white/20 
                                border border-white/20 transition shadow-md">
                                    <div class="bg-gradient-to-r from-[#144F5F] to-[#73BA7D] p-3 rounded-full mr-4">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-gray-200">Alamat Kantor</p>
                                        <p class="text-sm text-white leading-relaxed">
                                            Jl. Panggungan Asri No.37, RT.003/RW.033, Mayaan, Trihanggo,
                                            Kec. Gamping, Kab. Sleman, DIY 55291
                                        </p>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div
                                    class="flex items-center p-4 rounded-xl bg-white/10 hover:bg-white/20 
                                border border-white/20 transition shadow-md">
                                    <div class="bg-gradient-to-r from-[#144F5F] to-[#73BA7D] p-3 rounded-full mr-4">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-gray-200">Email</p>
                                        <p class="text-sm text-white">admin@intansafetyk3.com</p>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('hubungi-kami') }}"
                                class="block w-full mt-6 text-center py-3 rounded-lg font-medium text-white 
                            bg-gradient-to-r from-[#144F5F] to-[#73BA7D] 
                            hover:scale-105 hover:shadow-[0_0_20px_rgba(20,79,95,0.5)] 
                            transition transform">
                                Kirim Pesan kepada Tim Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ================= KONTROL SLIDER ================= -->

        <!-- Tombol Previous -->
        <button @click="activeSlide = (activeSlide - 1 + slides) % slides"
            class="absolute left-4 top-1/2 -translate-y-1/2 
            bg-white/70 backdrop-blur-md text-gray-800 px-3 py-2 
            rounded-full hover:bg-white hover:scale-110 transition shadow-xl"
            aria-label="Slide sebelumnya">
            ❮
        </button>

        <!-- Tombol Next -->
        <button @click="activeSlide = (activeSlide + 1) % slides"
            class="absolute right-4 top-1/2 -translate-y-1/2 
            bg-white/70 backdrop-blur-md text-gray-800 px-3 py-2 
            rounded-full hover:bg-white hover:scale-110 transition shadow-xl"
            aria-label="Slide berikutnya">
            ❯
        </button>

        <!-- Dot Navigation -->
        <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex space-x-3 z-10">
            <template x-for="i in slides" :key="i">
                <button @click="activeSlide = i - 1" class="w-3.5 h-3.5 rounded-full transition transform"
                    :class="activeSlide === i - 1 ?
                        'bg-white scale-125 shadow-lg' :
                        'bg-white/50 hover:bg-white/70'"
                    :aria-label="`Slide ${i}`"></button>
            </template>
        </div>
    </div>

    <!-- Section : Program Pelatihan Unggulan Section -->
    <section class="pt-16 pb-0 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
            <div class="mb-6 md:mb-0">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent">
                    Program Pelatihan Unggulan
                </h2>
                <p class="text-gray-600 mt-2">Pilih Program Pelatihan Sesuai Kebutuhan Anda</p>
            </div>

            <!-- Tab Navigation -->
            <div class="flex flex-wrap gap-2 md:gap-4">
                <button
                    class="tab-btn px-4 py-2 rounded-full border border-[#73BA7D] text-[#73BA7D] hover:bg-[#73BA7D] hover:text-white transition-colors duration-300 active"
                    data-category="kemnaker">
                    Kemnaker RI
                </button>
                <button
                    class="tab-btn px-4 py-2 rounded-full border border-[#73BA7D] text-[#73BA7D] hover:bg-[#73BA7D] hover:text-white transition-colors duration-300"
                    data-category="bnsp">
                    BNSP
                </button>
                <button
                    class="tab-btn px-4 py-2 rounded-full border border-[#73BA7D] text-[#73BA7D] hover:bg-[#73BA7D] hover:text-white transition-colors duration-300"
                    data-category="softskill">
                    Soft Skill
                </button>
            </div>
        </div>

        <!-- Program Content -->
        <div class="program-content">
            <!-- Kemnaker RI Programs (Default Active) -->
            <div class="program-category active" id="kemnaker">
                <div class="swiper programSwiper">
                    <div class="swiper-wrapper">
                        <!-- Card 1 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-transform duration-300 hover:shadow-lg">
                                <div class="h-48 bg-gray-200 overflow-hidden relative">
                                    <img src="{{ asset('images/Ahli K3 umum.jpg') }}" alt="Ahli K3 umum"
                                        class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Ahli K3 Umum</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">Perkembangan teknologi
                                        meningkatkan efisiensi industri, tetapi juga meningkatkan risiko kecelakaan kerja.
                                    </p>
                                    <div class="flex justify-between items-end">
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-kemnaker-ri']) }}"
                                            class="text-sm font-medium text-white px-4 py-2 rounded-lg flex items-center transition-all duration-300"
                                            style="background: linear-gradient(to right, #144F5F, #73BA7D);"
                                            onmouseover="this.style.background='linear-gradient(to right, #0f3a46, #5a9b6a)';"
                                            onmouseout="this.style.background='linear-gradient(to right, #144F5F, #73BA7D)';">
                                            Lihat
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-transform duration-300 hover:shadow-lg">
                                <div class="h-48 bg-gray-200 overflow-hidden relative">
                                    <img src="{{ asset('images/Auditor SMK3.jpg') }}" alt="Auditor SMK3"
                                        class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Auditor SMK3</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">
                                        Pelatihan Auditor SMK3 oleh Kementerian Ketenagakerjaan RI bertujuan menyiapkan
                                        auditor independen yang kompeten
                                        dalam menilai penerapan keselamatan dan kesehatan kerja di berbagai organisasi.
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-kemnaker-ri']) }}"
                                            class="text-sm font-medium text-white px-4 py-2 rounded-lg flex items-center transition-all duration-300"
                                            style="background: linear-gradient(to right, #144F5F, #73BA7D);"
                                            onmouseover="this.style.background='linear-gradient(to right, #0f3a46, #5a9b6a)';"
                                            onmouseout="this.style.background='linear-gradient(to right, #144F5F, #73BA7D)';">
                                            Lihat
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-transform duration-300 hover:shadow-lg">
                                <div class="h-48 bg-gray-200 overflow-hidden relative">
                                    <img src="{{ asset('images/Ahli K3 Spesialis PAA (Pesawat Angkat & Pesawat Angkut).jpg') }}"
                                        alt="Ahli K3 Spesialis PAA" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Offline Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Ahli K3 Spesialis PAA</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">
                                        Pesawat Angkat dan Angkut adalah peralatan yang sangat berguna bagi proses industri
                                        khususnya dalam pemindahan barang.
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-kemnaker-ri']) }}"
                                            class="text-sm font-medium text-white px-4 py-2 rounded-lg flex items-center transition-all duration-300"
                                            style="background: linear-gradient(to right, #144F5F, #73BA7D);"
                                            onmouseover="this.style.background='linear-gradient(to right, #0f3a46, #5a9b6a)';"
                                            onmouseout="this.style.background='linear-gradient(to right, #144F5F, #73BA7D)';">
                                            Lihat
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-transform duration-300 hover:shadow-lg">
                                <div class="h-48 bg-gray-200 overflow-hidden relative">
                                    <img src="{{ asset('images/Ahli K3 Spesialis PTP (Pesawat Tenaga Produksi).jpg') }}"
                                        alt="Ahli K3 Spesialis PTP" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Blended Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Ahli K3 Spesialis PTP</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">
                                        Keselamatan dan kesehatan kerja di sektor pesawat tenaga produksi menjadi perhatian
                                        utama bagi banyak pemerintah dan organisasi internasional.
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-kemnaker-ri']) }}"
                                            class="text-sm font-medium text-white px-4 py-2 rounded-lg flex items-center transition-all duration-300"
                                            style="background: linear-gradient(to right, #144F5F, #73BA7D);"
                                            onmouseover="this.style.background='linear-gradient(to right, #0f3a46, #5a9b6a)';"
                                            onmouseout="this.style.background='linear-gradient(to right, #144F5F, #73BA7D)';">
                                            Lihat
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 5 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-transform duration-300 hover:shadow-lg">
                                <div class="h-48 bg-gray-200 overflow-hidden relative">
                                    <img src="{{ asset('images/Ahli K3 Spesialis PUBT (Pesawat Uap & Bejana Tekan).jpg') }}"
                                        alt="Ahli K3 Spesialis PUBT" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Blended Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Ahli K3 Spesialis PUBT</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">
                                        Pemanfaatan bejana tekan akhir-akhir ini telah berkembang pesat di berbagai proses
                                        industri barang dan jasa maupun untuk fasilitas umum dan bahkan di rumah-rumah
                                        tangga.
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-kemnaker-ri']) }}"
                                            class="text-sm font-medium text-white px-4 py-2 rounded-lg flex items-center transition-all duration-300"
                                            style="background: linear-gradient(to right, #144F5F, #73BA7D);"
                                            onmouseover="this.style.background='linear-gradient(to right, #0f3a46, #5a9b6a)';"
                                            onmouseout="this.style.background='linear-gradient(to right, #144F5F, #73BA7D)';">
                                            Lihat
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Prev -->
                    <div
                        class="swiper-button-prev !static absolute left-4 top-1/2 -translate-y-1/2
                        bg-white/70 backdrop-blur-md text-[#144F5F] px-3 py-2 rounded-full
                        hover:bg-white hover:scale-110 transition-all shadow-xl flex items-center justify-center cursor-pointer z-10">
                        ❮
                    </div>

                    <!-- Tombol Next -->
                    <div
                        class="swiper-button-next !static absolute right-4 top-1/2 -translate-y-1/2
                        bg-white/70 backdrop-blur-md text-[#144F5F] px-3 py-2 rounded-full 
                        hover:bg-white hover:scale-110 transition-all shadow-xl flex items-center justify-center cursor-pointer z-10">
                        ❯
                    </div>
                </div>
            </div>

            <!-- BNSP Programs (Hidden by default) -->
            <div class="program-category hidden" id="bnsp">
                <div class="swiper programSwiper">
                    <div class="swiper-wrapper">
                        <!-- BNSP Card 1 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-transform duration-300 hover:shadow-lg">
                                <div class="h-48 bg-gray-200 overflow-hidden relative">
                                    <img src="{{ asset('images/Ahli K3 umum bnsp.jpg') }}" alt="Ahli K3 Umum BNSP"
                                        class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Ahli K3 Umum BNSP</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">
                                        Keselamatan dan Kesehatan Kerja (K3) penting bagi perusahaan nasional maupun
                                        internasional untuk melindungi karyawan dan meningkatkan efisiensi kerja.
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-bnsp']) }}"
                                            class="text-sm font-medium text-white px-4 py-2 rounded-lg flex items-center transition-all duration-300"
                                            style="background: linear-gradient(to right, #144F5F, #73BA7D);"
                                            onmouseover="this.style.background='linear-gradient(to right, #0f3a46, #5a9b6a)';"
                                            onmouseout="this.style.background='linear-gradient(to right, #144F5F, #73BA7D)';">
                                            Lihat
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- BNSP Card 2 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-transform duration-300 hover:shadow-lg">
                                <div class="h-48 bg-gray-200 overflow-hidden relative">
                                    <img src="{{ asset('images/HR Supervisor  Supervisor SDM.jpg') }}"
                                        alt="HR Supervisor Supervisor SDM" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">HR Supervisor Supervisor SDM</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">
                                        Seorang HR Supervisor memainkan peran penting sebagai penghubung antara manajemen
                                        dan karyawan dalam menjalankan kebijakan dan operasional sumber daya manusia.
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-bnsp']) }}"
                                            class="text-sm font-medium text-white px-4 py-2 rounded-lg flex items-center transition-all duration-300"
                                            style="background: linear-gradient(to right, #144F5F, #73BA7D);"
                                            onmouseover="this.style.background='linear-gradient(to right, #0f3a46, #5a9b6a)';"
                                            onmouseout="this.style.background='linear-gradient(to right, #144F5F, #73BA7D)';">
                                            Lihat
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- BNSP Card 3 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-transform duration-300 hover:shadow-lg">
                                <div class="h-48 bg-gray-200 overflow-hidden relative">
                                    <img src="{{ asset('images/HR Manager  Manajer SDM.jpg') }}"
                                        alt="HR Manager & Manajer SDM" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">HR Manager & Manajer SDM</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">
                                        Peran Human Resources (HR) Manager saat ini tidak hanya sebatas mengelola
                                        administrasi karyawan, tetapi juga sebagai mitra strategis dalam mendukung
                                        pencapaian tujuan organisasi.
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-bnsp']) }}"
                                            class="text-sm font-medium text-white px-4 py-2 rounded-lg flex items-center transition-all duration-300"
                                            style="background: linear-gradient(to right, #144F5F, #73BA7D);"
                                            onmouseover="this.style.background='linear-gradient(to right, #0f3a46, #5a9b6a)';"
                                            onmouseout="this.style.background='linear-gradient(to right, #144F5F, #73BA7D)';">
                                            Lihat
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Prev -->
                    <div
                        class="swiper-button-prev !static absolute left-4 top-1/2 -translate-y-1/2 
                        bg-white/70 backdrop-blur-md text-[#144F5F] px-3 py-2 rounded-full
                        hover:bg-white hover:scale-110 transition-all shadow-xl flex items-center justify-center cursor-pointer z-10">
                        ❮
                    </div>

                    <!-- Tombol Next -->
                    <div
                        class="swiper-button-next !static absolute right-4 top-1/2 -translate-y-1/2
                        bg-white/70 backdrop-blur-md text-[#144F5F] px-3 py-2 rounded-full
                        hover:bg-white hover:scale-110 transition-all shadow-xl flex items-center justify-center cursor-pointer z-10">
                        ❯
                    </div>
                </div>
            </div>

            <!-- Soft Skill Programs (Hidden by default) -->
            <div class="program-category hidden" id="softskill">
                <div class="swiper programSwiper">
                    <div class="swiper-wrapper">
                        <!-- Soft Skill Card 1 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-transform duration-300 hover:shadow-lg">
                                <div class="h-48 bg-gray-200 overflow-hidden relative">
                                    <img src="{{ asset('images/Public Speaking For Managers (Indonesian & English).jpg') }}"
                                        alt="Public Speaking" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Public Speaking For Managers</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">
                                        Seorang manajer tidak hanya dituntut untuk menguasai keterampilan teknis dan
                                        kepemimpinan, tetapi juga memiliki kemampuan komunikasi yang efektif, baik dalam
                                        bahasa Indonesia maupun bahasa Inggris.
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('layanan.index', ['category' => 'non-sertifikasi']) }}"
                                            class="text-sm font-medium text-white px-4 py-2 rounded-lg flex items-center transition-all duration-300"
                                            style="background: linear-gradient(to right, #144F5F, #73BA7D);"
                                            onmouseover="this.style.background='linear-gradient(to right, #0f3a46, #5a9b6a)';"
                                            onmouseout="this.style.background='linear-gradient(to right, #144F5F, #73BA7D)';">
                                            Lihat
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Soft Skill Card 2 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-transform duration-300 hover:shadow-lg">
                                <div class="h-48 bg-gray-200 overflow-hidden relative">
                                    <img src="{{ asset('images/Basic Fire Fighting.jpg') }}" alt="Basic Fire Fighting"
                                        class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Basic Fire Fighting</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">
                                        Kebakaran merupakan salah satu jenis keadaan darurat yang dapat terjadi kapan saja
                                        dan di mana saja, baik di lingkungan kerja, tempat tinggal, maupun fasilitas umum.
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('layanan.index', ['category' => 'non-sertifikasi']) }}"
                                            class="text-sm font-medium text-white px-4 py-2 rounded-lg flex items-center transition-all duration-300"
                                            style="background: linear-gradient(to right, #144F5F, #73BA7D);"
                                            onmouseover="this.style.background='linear-gradient(to right, #0f3a46, #5a9b6a)';"
                                            onmouseout="this.style.background='linear-gradient(to right, #144F5F, #73BA7D)';">
                                            Lihat
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Soft Skill Card 3 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 transition-transform duration-300 hover:shadow-lg">
                                <div class="h-48 bg-gray-200 overflow-hidden relative">
                                    <img src="{{ asset('images/Cost Reduction Strategy.jpg') }}"
                                        alt="Cost Reduction Strategy" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Cost Reduction Strategy</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">
                                        Di tengah dinamika bisnis yang semakin kompetitif dan penuh ketidakpastian,
                                        perusahaan dituntut untuk senantiasa meningkatkan efisiensi dan efektivitas
                                        operasional.
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('layanan.index', ['category' => 'non-sertifikasi']) }}"
                                            class="text-sm font-medium text-white px-4 py-2 rounded-lg flex items-center transition-all duration-300"
                                            style="background: linear-gradient(to right, #144F5F, #73BA7D);"
                                            onmouseover="this.style.background='linear-gradient(to right, #0f3a46, #5a9b6a)';"
                                            onmouseout="this.style.background='linear-gradient(to right, #144F5F, #73BA7D)';">
                                            Lihat
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Prev -->
                    <div
                        class="swiper-button-prev !static absolute left-4 top-1/2 -translate-y-1/2
                        bg-white/70 backdrop-blur-md text-[#144F5F] px-3 py-2 rounded-full
                        hover:bg-white hover:scale-110 transition-all shadow-xl flex items-center justify-center cursor-pointer z-10">
                        ❮
                    </div>

                    <!-- Tombol Next -->
                    <div
                        class="swiper-button-next !static absolute right-4 top-1/2 -translate-y-1/2
                        bg-white/70 backdrop-blur-md text-[#144F5F] px-3 py-2 rounded-full
                        hover:bg-white hover:scale-110 transition-all shadow-xl flex items-center justify-center cursor-pointer z-10">
                        ❯
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Legalitas Terjamin, Kualitas Terbukti -->
    <section class="relative py-16 px-4 md:px-8 lg:px-16 bg-gradient-to-br from-gray-50 via-white to-gray-100"
        aria-labelledby="legalitas-heading">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-10 items-start">

            <!-- Bagian Kiri -->
            <div class="lg:w-1/2">
                <h2 id="legalitas-heading"
                    class="text-3xl md:text-4xl font-extrabold 
                       bg-gradient-to-r from-[#144F5F] to-[#73BA7D] 
                       bg-clip-text text-transparent mb-6">
                    Legalitas Terjamin, Kualitas Terbukti
                </h2>

                <p class="text-gray-700 mb-6 leading-relaxed text-lg">
                    Intan Safety hadir sebagai mitra terpercaya dalam penyelenggaraan pelatihan dan sertifikasi
                    keselamatan dan kesehatan kerja (K3) dengan legalitas resmi dari Kemnaker RI dan Kemenkumham.
                    Kami berkomitmen menghadirkan program pelatihan berkualitas tinggi yang dirancang untuk
                    meningkatkan kompetensi tenaga kerja, profesional, serta perusahaan di berbagai sektor industri.
                </p>

                <!-- SEO Supporting Content -->
                <p class="text-gray-700 mb-8 leading-relaxed">
                    Dengan dukungan instruktur berpengalaman, kurikulum berbasis regulasi nasional, serta metode
                    pembelajaran yang fleksibel, setiap peserta dibekali pengetahuan dan keterampilan praktis
                    yang siap diterapkan di lingkungan kerja. Legalitas yang jelas menjadi fondasi utama kami
                    dalam menjaga kualitas layanan dan kepercayaan klien di seluruh Indonesia.
                </p>

                <!-- Grid Fitur -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Item -->
                    <div
                        class="p-6 rounded-2xl bg-white/60 backdrop-blur-xl border border-gray-200 shadow-lg hover:shadow-2xl transition">
                        <h3
                            class="text-lg font-semibold bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent mb-3">
                            Instruktur Berpengalaman
                        </h3>
                        <ul class="text-gray-800 space-y-2 text-sm">
                            <li class="flex items-start">
                                <span class="text-[#73BA7D] mt-1 mr-2">✔</span>
                                <span>Dibimbing oleh trainer profesional dan praktisi industri</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#73BA7D] mt-1 mr-2">✔</span>
                                <span>Bersertifikasi resmi dan berpengalaman di bidangnya</span>
                            </li>
                        </ul>
                    </div>

                    <div
                        class="p-6 rounded-2xl bg-white/60 backdrop-blur-xl border border-gray-200 shadow-lg hover:shadow-2xl transition">
                        <h3
                            class="text-lg font-semibold bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent mb-3">
                            Harga Kompetitif
                        </h3>
                        <ul class="text-gray-800 space-y-2 text-sm">
                            <li class="flex items-start">
                                <span class="text-[#73BA7D] mt-1 mr-2">✔</span>
                                <span>Biaya pelatihan sebanding dengan kualitas dan fasilitas terbaik</span>
                            </li>
                        </ul>
                    </div>

                    <div
                        class="p-6 rounded-2xl bg-white/60 backdrop-blur-xl border border-gray-200 shadow-lg hover:shadow-2xl transition">
                        <h3
                            class="text-lg font-semibold bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent mb-3">
                            PJK3 Resmi
                        </h3>
                        <ul class="text-gray-800 space-y-2 text-sm">
                            <li class="flex items-start">
                                <span class="text-[#73BA7D] mt-1 mr-2">✔</span>
                                <span>PJK3 resmi yang ditunjuk Kemnaker RI dan BNSP</span>
                            </li>
                        </ul>
                    </div>

                    <div
                        class="p-6 rounded-2xl bg-white/60 backdrop-blur-xl border border-gray-200 shadow-lg hover:shadow-2xl transition">
                        <h3
                            class="text-lg font-semibold bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent mb-3">
                            Kelas Training Terlengkap
                        </h3>
                        <ul class="text-gray-800 space-y-2 text-sm">
                            <li class="flex items-start">
                                <span class="text-[#73BA7D] mt-1 mr-2">✔</span>
                                <span>Lebih dari 100 pilihan pelatihan berbasis sertifikasi</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#73BA7D] mt-1 mr-2">✔</span>
                                <span>Kemnaker RI, BNSP, dan pelatihan non-sertifikasi</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Bagian Kanan -->
            <div class="lg:w-1/2">
                <div class="rounded-2xl overflow-hidden shadow-xl border border-gray-200 bg-white/70 backdrop-blur-md">
                    <div class="relative pb-[56.25%] h-0">
                        <iframe class="absolute top-0 left-0 w-full h-full rounded-t-2xl"
                            src="https://www.youtube.com/embed/yrtJ1GMbRr0"
                            title="Video Pelatihan dan Sertifikasi K3 Intan Safety" loading="lazy"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <p class="p-4 text-center text-gray-600 text-sm font-medium">
                        Januari Recap 2024 | Pelatihan & Sertifikasi K3 | Intan Safety Jogja
                    </p>
                </div>

                <!-- CTA -->
                <div class="mt-6 flex flex-col items-center space-y-4">
                    <a href="{{ route('schedule') }}" title="Lihat Jadwal Pelatihan K3"
                        aria-label="Lihat jadwal pelatihan dan sertifikasi K3"
                        class="inline-flex items-center px-6 py-3 
                           bg-gradient-to-r from-[#144F5F] to-[#73BA7D] 
                           text-white font-semibold rounded-lg shadow-lg 
                           hover:scale-105 transition">
                        Lihat Jadwal Pelatihan
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- Section: Jejak Alumni & Reputasi -->
    <section class="relative py-20 bg-gradient-to-br from-[#F5F9F4] to-white overflow-hidden"
        aria-labelledby="alumni-reputasi-heading">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Heading -->
            <div class="text-left max-w-3xl mb-16">
                <p class="text-sm font-medium text-green-700 flex items-center gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6h4m6 6V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2h10" />
                    </svg>
                    JEJAK ALUMNI & REPUTASI
                </p>

                <h2 id="alumni-reputasi-heading"
                    class="text-3xl md:text-4xl font-extrabold mb-4 
                       bg-gradient-to-r from-[#144F5F] to-[#73BA7D] 
                       bg-clip-text text-transparent inline-block">
                    Bersama Alumni, Membangun Kepercayaan dan Reputasi
                </h2>

                <p class="text-gray-600 text-lg leading-relaxed mb-4">
                    Lebih dari <span class="font-semibold text-[#73BA7D]">ribuan alumni</span> telah mengikuti
                    pelatihan dan sertifikasi K3 bersama Intan Safety, serta berkontribusi aktif di berbagai
                    sektor industri di Indonesia.
                </p>

                <!-- SEO Supporting Paragraph -->
                <p class="text-gray-600 leading-relaxed">
                    Jejak alumni menjadi bukti nyata kualitas program pelatihan kami dalam mencetak sumber daya
                    manusia yang <span class="font-semibold text-[#144F5F]">safety-oriented</span>,
                    <span class="font-semibold text-[#144F5F]">berkualitas</span>, dan
                    <span class="font-semibold text-[#144F5F]">kompeten</span>. Reputasi ini terus kami jaga
                    melalui peningkatan mutu pelatihan, kepatuhan regulasi, serta kepercayaan dari mitra industri.
                </p>
            </div>

            <!-- Counter Section -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center mb-16">

                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 mx-auto mb-4 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                        <i class="fas fa-users text-xl" aria-hidden="true"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-[#144F5F] counter" data-target="4000">0</h3>
                    <p class="mt-2 text-[#73BA7D] font-semibold">Alumni Terlatih</p>
                </div>

                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 mx-auto mb-4 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                        <i class="fas fa-chalkboard-teacher text-xl" aria-hidden="true"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-[#144F5F] counter" data-target="352">0</h3>
                    <p class="mt-2 text-[#73BA7D] font-semibold">Program Pembinaan</p>
                </div>

                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 mx-auto mb-4 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                        <i class="fas fa-handshake text-xl" aria-hidden="true"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-[#144F5F] counter" data-target="500">0</h3>
                    <p class="mt-2 text-[#73BA7D] font-semibold">Klien & Mitra Loyal</p>
                </div>

                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 mx-auto mb-4 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                        <i class="fas fa-industry text-xl" aria-hidden="true"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-[#144F5F] counter" data-target="100">0</h3>
                    <p class="mt-2 text-[#73BA7D] font-semibold">Perusahaan Mitra</p>
                </div>

            </div>

            <!-- Logo Carousel -->
            <div class="relative overflow-hidden" aria-label="Logo perusahaan mitra dan klien">
                <div class="flex animate-scroll space-x-16 items-center">

                    @php
                        $logos = [
                            'agincourt.png',
                            'ahm.png',
                            'antam.png',
                            'asc.webp',
                            'bhumi.png',
                            'cirebon.png',
                            'honda.jpg',
                            'huayue.png',
                            'indonesia-power.png',
                            'kai.png',
                            'pindad.png',
                        ];
                    @endphp

                    <!-- 2x loop agar carousel seamless -->
                    @for ($i = 0; $i < 2; $i++)
                        <div class="flex space-x-16 items-center shrink-0">
                            @foreach ($logos as $logo)
                                <img class="h-12 w-auto object-contain transition-all duration-300"
                                    src="{{ asset('images/logos/' . $logo) }}" alt="Logo perusahaan mitra Intan Safety"
                                    loading="lazy" width="120" height="48">
                            @endforeach
                        </div>
                    @endfor

                </div>
            </div>

        </div>
    </section>

    <!-- Section: Apa Kata Mereka -->
    <section class="py-2 bg-gray-50">
        <div class="container mx-auto px-4">

            <!-- Elfsight Google Reviews | Untitled Google Reviews -->
            <script src="https://elfsightcdn.com/platform.js" async></script>
            <div class="elfsight-app-489ce58d-f674-4a8f-aa60-61a1dc7e2b7c" data-elfsight-app-lazy></div>
        </div>
    </section>

    <!-- Section: Galeri Pembinaan -->
    <section class="bg-[#F3F7F0] py-20" aria-labelledby="galeri-heading">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Heading -->
            <div class="flex items-center justify-between mb-10">
                <div class="max-w-3xl">
                    <p class="text-sm font-medium text-green-700 flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6h4m6 6V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2h10" />
                        </svg>
                        GALERI PEMBINAAN KAMI
                    </p>

                    <h2 id="galeri-heading"
                        class="mt-2 text-3xl md:text-4xl font-extrabold
                           bg-gradient-to-r from-[#144F5F] to-[#73BA7D]
                           bg-clip-text text-transparent leading-snug mb-4">
                        Mengabadikan Momen Bersama Alumni
                    </h2>

                    <!-- Supporting text (SEO) -->
                    <p class="text-gray-600 leading-relaxed">
                        Dokumentasi kegiatan pelatihan dan pembinaan K3 bersama para alumni dan mitra perusahaan.
                        Galeri ini menampilkan suasana kelas, praktik lapangan, serta momen kebersamaan yang
                        mencerminkan komitmen kami dalam menghadirkan pelatihan berkualitas, profesional,
                        dan berstandar nasional.
                    </p>
                </div>
            </div>

            <!-- Gallery Auto Slider -->
            <div class="relative max-w-5xl mx-auto">

                <!-- Slide -->
                <div class="overflow-hidden rounded-xl shadow-lg relative">
                    <img id="galleryImage" src="{{ asset('images/galeri/pict1.jpg') }}"
                        alt="Dokumentasi pelatihan dan pembinaan K3 bersama alumni Intan Safety" width="1200"
                        height="500" loading="lazy" class="pointer-events-none w-full h-[500px] object-cover">

                    <!-- Prev Button -->
                    <button type="button" id="prevBtn"
                        class="absolute left-4 top-1/2 -translate-y-1/2
                        z-50 pointer-events-auto
                        bg-white/80 text-black p-3 rounded-full
                        shadow-lg hover:bg-white transition">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <!-- Next Button -->
                    <button type="button" id="nextBtn"
                        class="absolute right-4 top-1/2 -translate-y-1/2
                        z-50 pointer-events-auto
                        bg-white/80 text-black p-3 rounded-full
                        shadow-lg hover:bg-white transition">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <!-- Indicators -->
                <div class="flex justify-center mt-4 space-x-2" aria-hidden="true">
                    <template id="indicatorTemplate">
                        <div class="w-3 h-3 rounded-full bg-gray-400 cursor-pointer"></div>
                    </template>
                    <div id="indicators" class="flex space-x-2"></div>
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center mt-12">
                <a href="{{ route('galeri') }}"
                    class="inline-block px-6 py-3 rounded-md shadow
                       bg-gradient-to-r from-[#144F5F] to-[#73BA7D]
                       text-white font-medium transition-all duration-300
                       hover:opacity-90">
                    Lihat Galeri Lengkap
                </a>
            </div>

        </div>
    </section>

    <!-- Section: Recent Blogs -->
    <section class="bg-[#F3F7F0] py-20" aria-labelledby="blog-heading">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Header -->
            <div class="flex items-center justify-between mb-12">
                <div class="max-w-3xl">
                    <p class="text-sm font-medium text-green-700 flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6h4m6 6V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2h10" />
                        </svg>
                        ARTIKEL & EDUKASI
                    </p>

                    <h2 id="blog-heading"
                        class="mt-2 text-3xl md:text-4xl font-extrabold
                           bg-gradient-to-r from-[#144F5F] to-[#73BA7D]
                           bg-clip-text text-transparent leading-snug mb-4">
                        Insight & Edukasi Seputar Pelatihan dan Sertifikasi K3
                    </h2>

                    <!-- Supporting content (SEO) -->
                    <p class="text-gray-600 leading-relaxed">
                        Kumpulan artikel terbaru yang membahas pelatihan K3, sertifikasi Kemnaker RI, sertifikasi BNSP,
                        serta berbagai topik keselamatan dan kesehatan kerja. Konten ini disusun untuk membantu individu
                        maupun perusahaan memahami pentingnya kompetensi, kepatuhan regulasi, dan budaya kerja yang aman
                        dan produktif.
                    </p>
                </div>
            </div>

            <!-- Blog Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Card 1 -->
                <article class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                    <img src="{{ asset('images/artikel/artikel1.jpg') }}"
                        alt="Pentingnya sertifikasi K3 untuk keselamatan kerja di perusahaan" width="400"
                        height="224" loading="lazy" class="w-full h-56 object-cover">
                    <div class="p-5">
                        <div class="flex items-center text-sm text-gray-500 mb-3 gap-4">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                9 September 2025
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A9.935 9.935 0 0112 15c2.21 0 4.235.716 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Admin
                            </span>
                        </div>

                        <h3 class="text-lg font-semibold text-[#144F5F] mb-2">
                            Pentingnya Sertifikasi K3 untuk Keselamatan Kerja di Perusahaan
                        </h3>

                        <p class="text-gray-600 text-sm mb-4">
                            Pelatihan dan sertifikasi K3 membantu perusahaan menciptakan lingkungan kerja yang aman,
                            patuh regulasi, serta meningkatkan kompetensi tenaga kerja sesuai standar Kemnaker RI.
                        </p>

                        <a href="{{ route('articles.index') }}"
                            class="text-[#144F5F] font-medium flex items-center gap-1 hover:underline"
                            aria-label="Baca artikel tentang pentingnya sertifikasi K3">
                            Baca Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Card 2 -->
                <article class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                    <img src="{{ asset('images/artikel/artikel2.jpg') }}"
                        alt="Jenis-jenis pelatihan Kemnaker yang wajib diikuti tenaga kerja" width="400"
                        height="224" loading="lazy" class="w-full h-56 object-cover">
                    <div class="p-5">
                        <div class="flex items-center text-sm text-gray-500 mb-3 gap-4">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                10 September 2025
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A9.935 9.935 0 0112 15c2.21 0 4.235.716 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Admin
                            </span>
                        </div>

                        <h3 class="text-lg font-semibold text-[#144F5F] mb-2">
                            Mengenal Jenis-Jenis Pelatihan Kemnaker yang Wajib Diikuti
                        </h3>

                        <p class="text-gray-600 text-sm mb-4">
                            Pelatihan Kemnaker seperti Ahli K3 Umum dan operator alat berat menjadi fondasi penting
                            dalam meningkatkan produktivitas dan keselamatan kerja.
                        </p>

                        <a href="{{ route('articles.index') }}"
                            class="text-[#144F5F] font-medium flex items-center gap-1 hover:underline"
                            aria-label="Baca artikel jenis-jenis pelatihan Kemnaker">
                            Baca Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Card 3 -->
                <article class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                    <img src="{{ asset('images/artikel/artikel3.jpg') }}"
                        alt="Keunggulan sertifikasi BNSP untuk pengembangan karier dan perusahaan" width="400"
                        height="224" loading="lazy" class="w-full h-56 object-cover">
                    <div class="p-5">
                        <div class="flex items-center text-sm text-gray-500 mb-3 gap-4">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                11 September 2025
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A9.935 9.935 0 0112 15c2.21 0 4.235.716 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Admin
                            </span>
                        </div>

                        <h3 class="text-lg font-semibold text-[#144F5F] mb-2">
                            Keunggulan Sertifikasi BNSP untuk Karier dan Perusahaan
                        </h3>

                        <p class="text-gray-600 text-sm mb-4">
                            Sertifikasi BNSP memperkuat kompetensi nasional tenaga kerja, meningkatkan peluang karier,
                            serta menumbuhkan kepercayaan klien dan mitra bisnis.
                        </p>

                        <a href="{{ route('articles.index') }}"
                            class="text-[#144F5F] font-medium flex items-center gap-1 hover:underline"
                            aria-label="Baca artikel keunggulan sertifikasi BNSP">
                            Baca Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </article>

            </div>
        </div>
    </section>

@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const images = [
            "/images/galeri/pict1.jpg",
            "/images/galeri/pict2.jpg",
            "/images/galeri/pict3.jpg"
        ];

        let currentIndex = 0;
        const img = document.getElementById("galleryImage");
        const next = document.getElementById("nextBtn");
        const prev = document.getElementById("prevBtn");

        if (!img || !next || !prev) return;

        function update() {
            img.src = images[currentIndex];
        }

        next.onclick = () => {
            currentIndex = (currentIndex + 1) % images.length;
            update();
        };

        prev.onclick = () => {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            update();
        };

        update();
    });
</script>

</body>

</html>
