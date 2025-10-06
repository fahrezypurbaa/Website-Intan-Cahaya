@extends('layouts.app')

@section('title', 'Home - Intan Safety')

@section('content')

    <!-- Hero Section -->
    <div x-data="{ activeSlide: 0, slides: 3 }" x-init="setInterval(() => { activeSlide = (activeSlide + 1) % slides }, 8000)" class="relative w-full h-screen min-h-[600px] overflow-hidden">

        <!-- Wrapper Slides -->
        <div class="flex h-full transition-transform duration-700 ease-in-out"
            :style="`transform: translateX(-${activeSlide * 100}%)`">

            <!-- Slide 1 -->
            <div class="w-full flex-shrink-0 relative h-full">
                <div class="absolute inset-0">
                    <img src="{{ asset('images/Kolase 2.jpg') }}" alt="Hero 1" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-black/60"></div>
                </div>
                <div class="absolute inset-0 flex items-center justify-center px-4">
                    <h1
                        class="text-4xl md:text-6xl font-extrabold text-center 
                           bg-gradient-to-r from-white via-gray-200 to-gray-100 bg-clip-text text-transparent 
                           drop-shadow-[0_4px_10px_rgba(0,0,0,0.8)] tracking-wide leading-tight">
                        Welcome to Our Website
                    </h1>
                </div>
            </div>

            <!-- Slide 2 (Achievements) -->
            <div class="w-full flex-shrink-0 relative h-full">
                <div class="absolute inset-0">
                    <img src="{{ asset('images/2.png') }}" alt="Hero 2" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-black/70"></div>
                </div>

                <div class="absolute inset-0 flex flex-col items-center justify-center text-white px-6"
                    x-data="{ show: false }" x-init="$watch('activeSlide', val => show = (val === 1))">

                    <!-- Judul -->
                    <h2 x-show="show" x-transition.duration.700ms
                        class="text-3xl md:text-5xl font-extrabold mb-10 text-center 
                           bg-gradient-to-r from-white via-gray-200 to-gray-100 bg-clip-text text-transparent
                           drop-shadow-xl tracking-wide">
                        Our Achievements
                    </h2>

                    <!-- Grid Card -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 w-full max-w-5xl">
                        <!-- Card (template) -->
                        <template
                            x-for="(card, index) in [
                        {label:'Alumni',target:4000,suffix:'+'},
                        {label:'Pembinaan',target:352,suffix:''},
                        {label:'Loyal Customer',target:500,suffix:'+'},
                        {label:'Perusahaan',target:352,suffix:''}
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
                                            if (count < target) { count += Math.ceil(target / 100); } else {
                                                count = target;
                                                clearInterval(interval);
                                            }
                                        }, 30);
                                    } else { count = 0; }
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

            <!-- Slide 3 -->
            <div class="w-full flex-shrink-0 relative h-full">
                <!-- Background -->
                <div class="absolute inset-0">
                    <img src="{{ asset('images/Kolase 1.jpg') }}" alt="Safety Quality Competent WINNANETY"
                        class="w-full h-full object-cover">
                    <!-- Overlay gradient elegan -->
                    <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-black/70"></div>
                </div>

                <!-- Overlay konten -->
                <div class="absolute inset-0 flex items-center justify-center py-8 px-4">
                    <div class="w-full max-w-7xl mx-auto">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                            <!-- Kiri: Safety Quality -->
                            <div class="text-center lg:text-left">
                                <div class="mb-6">
                                    <!-- Safety -->
                                    <h2
                                        class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black uppercase 
                                   bg-gradient-to-r from-[#73BA7D] to-[#144F5F] bg-clip-text text-transparent
                                   drop-shadow-[0_4px_12px_rgba(0,0,0,0.9)] tracking-wide leading-tight">
                                        Safety
                                    </h2>
                                    <!-- Quality -->
                                    <h3
                                        class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black uppercase 
                                   bg-gradient-to-r from-white via-gray-200 to-white bg-clip-text text-transparent
                                   drop-shadow-[0_4px_12px_rgba(0,0,0,0.9)] tracking-wide leading-tight">
                                        Quality
                                    </h3>
                                </div>

                                <!-- Competent -->
                                <p
                                    class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold uppercase 
                              bg-gradient-to-r from-[#73BA7D] to-[#144F5F] bg-clip-text text-transparent
                              drop-shadow-xl tracking-wider leading-tight">
                                    Competent
                                </p>

                                <!-- Nama perusahaan -->
                                <div class="mt-6">
                                    <span
                                        class="inline-block px-6 py-3 rounded-lg 
                                     bg-gradient-to-r from-[#144F5F] to-[#73BA7D] 
                                     text-white font-bold text-xl sm:text-2xl tracking-wide 
                                     shadow-lg hover:scale-105 transition">
                                        IntanSafety
                                    </span>
                                </div>
                            </div>

                            <!-- Kanan: Hubungi Kami -->
                            <div
                                class="bg-white/20 backdrop-blur-xl border border-white/30 
                            rounded-2xl shadow-2xl p-6 lg:p-8">

                                <h3
                                    class="text-2xl font-bold mb-6 text-center 
                               bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent">
                                    Hubungi Kami
                                </h3>

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
                                            <p class="text-base font-medium text-white">(+62) 82146134846</p>
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
                                            <p class="text-xs font-semibold text-gray-200">Alamat</p>
                                            <p class="text-sm text-white leading-relaxed">
                                                Jl. Panggungan Asri No.37, RT.003/RW.033, Mayaan, Trihanggo, Kec. Gamping,
                                                Kab. Sleman, DIY 55291
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
                                            <p class="text-sm text-white">admin@intancahayamandiri.com</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- CTA -->
                                <a href="{{ route('hubungi-kami') }}"
                                    class="block w-full mt-6 text-center py-3 rounded-lg font-medium text-white 
                              bg-gradient-to-r from-[#144F5F] to-[#73BA7D] 
                              hover:scale-105 hover:shadow-[0_0_20px_rgba(20,79,95,0.5)] 
                              transition transform">
                                    ✉️ Kirim Pesan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Tombol kontrol -->
        <button @click="activeSlide = (activeSlide - 1 + slides) % slides"
            class="absolute left-4 top-1/2 -translate-y-1/2 
               bg-white/70 backdrop-blur-md text-gray-800 px-3 py-2 
               rounded-full hover:bg-white hover:scale-110 transition shadow-xl">
            ❮
        </button>
        <button @click="activeSlide = (activeSlide + 1) % slides"
            class="absolute right-4 top-1/2 -translate-y-1/2 
               bg-white/70 backdrop-blur-md text-gray-800 px-3 py-2 
               rounded-full hover:bg-white hover:scale-110 transition shadow-xl">
            ❯
        </button>

        <!-- Navigasi dot -->
        <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex space-x-3 z-10">
            <template x-for="i in slides" :key="i">
                <button @click="activeSlide = i - 1" class="w-3.5 h-3.5 rounded-full transition transform"
                    :class="activeSlide === i - 1 ?
                        'bg-white scale-125 shadow-lg' :
                        'bg-white/50 hover:bg-white/70'">
                </button>
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
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1597852074816-d933c7d2b988?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                        alt="Juru Las 1" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Juru Las 1</h3>
                                    <p class="text-gray-600 mb-4">Pelatihan sertifikasi juru las tingkat 1 dengan
                                        standar Kemnaker RI</p>
                                    <div class="flex justify-between items-end">
                                        <div class="flex flex-col">
                                            <!-- Harga normal -->
                                            <span class="text-gray-400 line-through text-sm">Rp 3.000.000</span>
                                            <!-- Harga promo -->
                                            <span class="text-[#73BA7D] font-bold text-lg">Rp 2.500.000</span>
                                        </div>
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-kemnaker-ri']) }}"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
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
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                        alt="Juru Las 2" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Juru Las 2</h3>
                                    <p class="text-gray-600 mb-4">Pelatihan sertifikasi juru las tingkat 2 dengan
                                        standar Kemnaker RI</p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex flex-col">
                                            <!-- Harga normal -->
                                            <span class="text-gray-400 line-through text-sm">Rp 6.000.000</span>
                                            <!-- Harga promo -->
                                            <span class="text-[#73BA7D] font-bold text-lg">Rp 5.500.000</span>
                                        </div>
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-kemnaker-ri']) }}"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
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
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                        alt="Juru Las 3" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Offline Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Juru Las 3</h3>
                                    <p class="text-gray-600 mb-4">Pelatihan sertifikasi juru las tingkat 3 dengan
                                        standar Kemnaker RI</p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex flex-col">
                                            <!-- Harga normal -->
                                            <span class="text-gray-400 line-through text-sm">Rp 5.000.000</span>
                                            <!-- Harga promo -->
                                            <span class="text-[#73BA7D] font-bold text-lg">Rp 4.500.000</span>
                                        </div>
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-kemnaker-ri']) }}"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
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
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                        alt="Overhead Crane" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Blended Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Overhead Crane</h3>
                                    <p class="text-gray-600 mb-4">Pelatihan operator overhead crane bersertifikat
                                        Kemnaker RI</p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex flex-col">
                                            <!-- Harga normal -->
                                            <span class="text-gray-400 line-through text-sm">Rp 3.500.000</span>
                                            <!-- Harga promo -->
                                            <span class="text-[#73BA7D] font-bold text-lg">Rp 3.000.000</span>
                                        </div>
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-kemnaker-ri']) }}"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
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
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                        alt="Advance Financial" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Blended Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Advance Financial</h3>
                                    <p class="text-gray-600 mb-4">Pelatihan keuangan tingkat lanjut dengan sertifikasi
                                        Kemnaker RI</p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex flex-col">
                                            <!-- Harga normal -->
                                            <span class="text-gray-400 line-through text-sm">Rp 5.000.000</span>
                                            <!-- Harga promo -->
                                            <span class="text-[#73BA7D] font-bold text-lg">Rp 4.500.000</span>
                                        </div>
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-kemnaker-ri']) }}"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
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

                    <!-- Navigation buttons -->
                    <div
                        class="swiper-button-next absolute top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg rounded-full flex items-center justify-center w-12 h-12 -right-6">
                        <svg class="w-6 h-6 text-[#144F5F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                    <div
                        class="swiper-button-prev absolute top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg rounded-full flex items-center justify-center w-12 h-12 -left-6">
                        <svg class="w-6 h-6 text-[#144F5F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
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
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                        alt="Ahli K3 Umum" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Ahli K3 Umum</h3>
                                    <p class="text-gray-600 mb-4">Sertifikasi ahli K3 umum bersertifikat BNSP</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-[#73BA7D] font-bold">Rp 4.500.000</span>
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-bnsp']) }}"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
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
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                        alt="Teknisi Listrik" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Teknisi Listrik</h3>
                                    <p class="text-gray-600 mb-4">Sertifikasi teknisi listrik bersertifikat BNSP</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-[#73BA7D] font-bold">Rp 3.800.000</span>
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-bnsp']) }}"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
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
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1581092795360-fd1ca04f0952?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                        alt="Operator Boiler" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Operator Boiler</h3>
                                    <p class="text-gray-600 mb-4">Sertifikasi bersertifikat BNSP</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-[#73BA7D] font-bold">Rp 3.200.000</span>
                                        <a href="{{ route('layanan.index', ['category' => 'sertifikasi-bnsp']) }}"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
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

                    <!-- Navigation buttons -->
                    <div
                        class="swiper-button-next absolute top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg rounded-full flex items-center justify-center w-12 h-12 -right-6">
                        <svg class="w-6 h-6 text-[#144F5F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                    <div
                        class="swiper-button-prev absolute top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg rounded-full flex items-center justify-center w-12 h-12 -left-6">
                        <svg class="w-6 h-6 text-[#144F5F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
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
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                        alt="Public Speaking" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Public Speaking</h3>
                                    <p class="text-gray-600 mb-4">Pelatihan public speaking untuk jenjang profesional
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-[#73BA7D] font-bold">Rp 1.800.000</span>
                                        <a href="{{ route('layanan.index', ['category' => 'non-sertifikasi']) }}"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
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
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                        alt="Leadership" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Leadership</h3>
                                    <p class="text-gray-600 mb-4">Pengembangan kemampuan kepemimpinan</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-[#73BA7D] font-bold">Rp 2.500.000</span>
                                        <a href="{{ route('layanan.index', ['category' => 'non-sertifikasi']) }}"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
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
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1571260899304-425eee4c7efc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                        alt="Team Building" class="w-full h-full object-cover">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full text-gray-700">
                                            Online Training
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-[#144F5F] mb-2">Team Building</h3>
                                    <p class="text-gray-600 mb-4">Pelatihan membangun tim yang solid dan efektif</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-[#73BA7D] font-bold">Rp 3.200.000</span>
                                        <a href="{{ route('layanan.index', ['category' => 'non-sertifikasi']) }}"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
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

                    <!-- Navigation buttons -->
                    <div
                        class="swiper-button-next absolute top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg rounded-full flex items-center justify-center w-12 h-12 -right-6">
                        <svg class="w-6 h-6 text-[#144F5F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                    <div
                        class="swiper-button-prev absolute top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg rounded-full flex items-center justify-center w-12 h-12 -left-6">
                        <svg class="w-6 h-6 text-[#144F5F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Legalitas Terjamin, Kualitas Terbukti -->
    <section class="relative py-16 px-4 md:px-8 lg:px-16 bg-gradient-to-br from-gray-50 via-white to-gray-100">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-10 items-start">

            <!-- Bagian Kiri -->
            <div class="lg:w-1/2">
                <h2
                    class="text-3xl md:text-4xl font-extrabold 
                       bg-gradient-to-r from-[#144F5F] to-[#73BA7D] 
                       bg-clip-text text-transparent mb-6">
                    Legalitas Terjamin, Kualitas Terbukti
                </h2>
                <p class="text-gray-700 mb-8 leading-relaxed text-lg">
                    Kami lahir sebagai mitra terpercaya dalam pembinaan & pelatihan K3 dengan legalitas resmi Kemnaker
                    RI & Kemenkumham. Mengutamakan kualitas, pengalaman, serta pelayanan terbaik untuk mencetak tenaga
                    kerja yang kompeten dan siap menghadapi tantangan di dunia industri.
                </p>

                <!-- Grid Kotak-kotak -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kotak -->
                    <div
                        class="p-6 rounded-2xl bg-white/60 backdrop-blur-xl border border-gray-200 shadow-lg hover:shadow-2xl transition">
                        <h3
                            class="text-lg font-semibold bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent mb-3">
                            INSTRUKTUR BERPENGALAMAN
                        </h3>
                        <ul class="text-gray-800 space-y-2 text-sm">
                            <li class="flex items-start">
                                <span class="text-[#73BA7D] mt-1 mr-2"><i class="fas fa-check"></i></span>
                                <span>Dibimbing oleh berbagai trainer</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#73BA7D] mt-1 mr-2"><i class="fas fa-check"></i></span>
                                <span>Bersertifikasi dan profesional</span>
                            </li>
                        </ul>
                    </div>

                    <div
                        class="p-6 rounded-2xl bg-white/60 backdrop-blur-xl border border-gray-200 shadow-lg hover:shadow-2xl transition">
                        <h3
                            class="text-lg font-semibold bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent mb-3">
                            HARGA KOMPETITIF
                        </h3>
                        <ul class="text-gray-800 space-y-2 text-sm">
                            <li class="flex items-start">
                                <span class="text-[#73BA7D] mt-1 mr-2"><i class="fas fa-check"></i></span>
                                <span>Harga kompetitif dengan kualitas pelatihan terbaik</span>
                            </li>
                        </ul>
                    </div>

                    <div
                        class="p-6 rounded-2xl bg-white/60 backdrop-blur-xl border border-gray-200 shadow-lg hover:shadow-2xl transition">
                        <h3
                            class="text-lg font-semibold bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent mb-3">
                            PJK3 RESMI
                        </h3>
                        <ul class="text-gray-800 space-y-2 text-sm">
                            <li class="flex items-start">
                                <span class="text-[#73BA7D] mt-1 mr-2"><i class="fas fa-check"></i></span>
                                <span>PJK3 Resmi diunjuk KEMNAKER RI dan BNSP</span>
                            </li>
                        </ul>
                    </div>

                    <div
                        class="p-6 rounded-2xl bg-white/60 backdrop-blur-xl border border-gray-200 shadow-lg hover:shadow-2xl transition">
                        <h3
                            class="text-lg font-semibold bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent mb-3">
                            KELAS TRAINING TERLENGKAP
                        </h3>
                        <ul class="text-gray-800 space-y-2 text-sm">
                            <li class="flex items-start">
                                <span class="text-[#73BA7D] mt-1 mr-2"><i class="fas fa-check"></i></span>
                                <span>100+ pilihan pelatihan berbasis sertifikasi</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#73BA7D] mt-1 mr-2"><i class="fas fa-check"></i></span>
                                <span>Kemnaker RI, BNSP, Non Sertifikasi, dll</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Bagian Kanan -->
            <!-- Bagian Kanan -->
            <div class="lg:w-1/2">
                <div class="rounded-2xl overflow-hidden shadow-xl border border-gray-200 bg-white/70 backdrop-blur-md">
                    <div class="relative pb-[56.25%] h-0">
                        <iframe class="absolute top-0 left-0 w-full h-full rounded-t-2xl"
                            src="https://www.youtube.com/embed/yrtJ1GMbRr0" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <p class="p-4 text-center text-gray-600 text-sm font-medium">
                        JANUARI RECAP 2024 | Pelatihan & Sertifikasi K3 | Intan Safety Jogja
                    </p>
                </div>

                <!-- Tambahan bawah video -->
                <div class="mt-6 flex flex-col items-center space-y-4">
                    <!-- CTA -->
                    <a href="{{ route('schedule') }}"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white font-semibold rounded-lg shadow-lg hover:scale-105 transition">
                        📅 Lihat Jadwal Pelatihan
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Jejak Alumni & Reputasi -->
    <section class="relative py-20 bg-gradient-to-br from-[#F5F9F4] to-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Heading -->
            <div class="text-left max-w-3xl mb-16">
                <p class="text-sm font-medium text-green-700 flex items-center gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6h4m6 6V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2h10" />
                    </svg>
                    JEJAK ALUMNI & REPUTASI
                </p>
                <h2
                    class="text-3xl md:text-4xl font-extrabold mb-4 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent inline-block">
                    Bersama Alumni, Membangun Kepercayaan dan Reputasi
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Lebih dari <span class="font-semibold text-[#73BA7D]">ribuan alumni</span> telah mengikuti pelatihan K3
                    bersama kami
                    dan kini berkontribusi di berbagai bidang kerja. Kami berkomitmen mencetak SDM yang
                    <span class="text-[#144F5F] font-semibold">#Safety</span>,
                    <span class="text-[#144F5F] font-semibold">#Quality</span>, dan
                    <span class="text-[#144F5F] font-semibold">#Competent</span>.
                </p>
            </div>

            <!-- Counter Section -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center mb-16">
                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 mx-auto mb-4 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <h2 class="text-4xl font-bold text-[#144F5F] counter" data-target="4000">0</h2>
                    <p class="mt-2 text-[#73BA7D] font-semibold">Alumni</p>
                </div>

                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 mx-auto mb-4 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                        <i class="fas fa-chalkboard-teacher text-xl"></i>
                    </div>
                    <h2 class="text-4xl font-bold text-[#144F5F] counter" data-target="352">0</h2>
                    <p class="mt-2 text-[#73BA7D] font-semibold">Program Pembinaan</p>
                </div>

                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 mx-auto mb-4 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                        <i class="fas fa-handshake text-xl"></i>
                    </div>
                    <h2 class="text-4xl font-bold text-[#144F5F] counter" data-target="500">0</h2>
                    <p class="mt-2 text-[#73BA7D] font-semibold">Loyal Customer</p>
                </div>

                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 mx-auto mb-4 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                        <i class="fas fa-industry text-xl"></i>
                    </div>
                    <h2 class="text-4xl font-bold text-[#144F5F] counter" data-target="100">0</h2>
                    <p class="mt-2 text-[#73BA7D] font-semibold">Perusahaan Mitra</p>
                </div>
            </div>

            <!-- Logo Carousel -->
            <div class="relative overflow-hidden">
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

                    <!-- 2x loop supaya seamless -->
                    @for ($i = 0; $i < 2; $i++)
                        <div class="flex space-x-16 items-center shrink-0">
                            @foreach ($logos as $logo)
                                <img class="h-12 w-auto object-contain transition-all duration-300"
                                    src="{{ asset('images/logos/' . $logo) }}" alt="Company Logo">
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


            <!-- Elfsight Google Reviews -->
            <script src="https://elfsightcdn.com/platform.js" async></script>
            <div class="elfsight-app-18b68430-51d2-4621-badf-0bfea93a2c7c" data-elfsight-app-lazy></div>
        </div>
    </section>

    <!-- Section: Galeri -->
    <div class="bg-[#F3F7F0] py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <!-- Heading -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <p class="text-sm font-medium text-green-700 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6h4m6 6V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2h10" />
                        </svg>
                        GALERI PEMBINAAN KAMI
                    </p>
                    <h2
                        class="mt-2 text-3xl font-bold bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent leading-snug">
                        Mengabadikan Moment <br> Bersama Alumni
                    </h2>
                </div>
            </div>

            <!-- Gallery Auto Slider Lengkap -->
            <div class="relative max-w-5xl mx-auto">
                <!-- Slide -->
                <div class="overflow-hidden rounded-xl shadow-lg relative">
                    <img id="galleryImage" src="{{ asset('images/galeri/pict1.jpg') }}" alt="gallery"
                        class="w-full h-[500px] object-cover transition-all duration-700">

                    <!-- Prev Button -->
                    <button onclick="prevImage()"
                        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 text-black p-3 rounded-full shadow-lg hover:bg-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <!-- Next Button -->
                    <button onclick="nextImage()"
                        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 text-black p-3 rounded-full shadow-lg hover:bg-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <!-- Indicators -->
                <div class="flex justify-center mt-4 space-x-2">
                    <template id="indicatorTemplate">
                        <div class="w-3 h-3 rounded-full bg-gray-400 cursor-pointer"></div>
                    </template>
                    <div id="indicators" class="flex space-x-2"></div>
                </div>
            </div>

            <!-- Button -->
            <div class="text-center mt-10">
                <a href="{{ route('galeri') }}"
                    class="px-6 py-2 rounded-md shadow bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white font-medium transition-all duration-300 hover:opacity-90">
                    Selengkapnya
                </a>

            </div>
        </div>
    </div>

    <!-- Recent Blogs Section -->
    <div class="bg-[#F3F7F0] py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <p class="text-sm font-medium text-green-700 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6h4m6 6V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2h10" />
                        </svg>
                        RECENT BLOGS
                    </p>
                    <h2
                        class="mt-2 text-3xl font-bold leading-snug bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent inline-block">
                        Journeys of Discovery <br> Uncovering Hidden
                    </h2>

                </div>
            </div>

            <!-- Blog Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                    <img src="{{ asset('images/artikel/artikel1.jpg') }}" alt="Blog image"
                        class="w-full h-56 object-cover">
                    <div class="p-5">
                        <div class="flex items-center text-sm text-gray-500 mb-3 gap-4">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                September 9, 2025
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A9.935 9.935 0 0112 15c2.21 0 4.235.716 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
                                </svg>
                                By admin
                            </span>
                        </div>
                        <h3 class="text-lg font-semibold text-green-800 mb-2">
                            Pentingnya Sertifikasi K3 untuk Keselamatan Kerja di Perusahaan
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Pelatihan dan sertifikasi K3 tidak hanya meningkatkan kompetensi tenaga kerja, tetapi juga
                            memastikan lingkungan kerja lebih aman sesuai standar Kemnaker.
                        </p>
                        <a href="{{ route('articles.index') }}"
                            class="text-green-700 font-medium flex items-center gap-1 hover:underline">
                            Read More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                    <img src="{{ asset('images/artikel/artikel2.jpg') }}" alt="Blog image"
                        class="w-full h-56 object-cover">
                    <div class="p-5">
                        <div class="flex items-center text-sm text-gray-500 mb-3 gap-4">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                September 10, 2025
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A9.935 9.935 0 0112 15c2.21 0 4.235.716 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
                                </svg>
                                By admin
                            </span>
                        </div>
                        <h3 class="text-lg font-semibold text-green-800 mb-2">
                            Mengenal Jenis–Jenis Pelatihan Kemnaker yang Wajib Diikuti
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Dari Ahli K3 Umum hingga operator forklift, pelatihan Kemnaker berperan penting dalam
                            mendukung
                            produktivitas dan keselamatan kerja.
                        </p>
                        <a href="{{ route('articles.index') }}"
                            class="text-green-700 font-medium flex items-center gap-1 hover:underline">
                            Read More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                    <img src="{{ asset('images/artikel/artikel3.jpg') }}" alt="Blog image"
                        class="w-full h-56 object-cover">
                    <div class="p-5">
                        <div class="flex items-center text-sm text-gray-500 mb-3 gap-4">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                September 11, 2025
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A9.935 9.935 0 0112 15c2.21 0 4.235.716 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
                                </svg>
                                By admin
                            </span>
                        </div>
                        <h3 class="text-lg font-semibold text-green-800 mb-2">
                            Keunggulan Sertifikasi BNSP untuk Karier dan Perusahaan
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Sertifikasi BNSP meningkatkan kompetensi nasional, peluang karier, dan memperkuat
                            kepercayaan
                            klien terhadap perusahaan.
                        </p>
                        <a href="{{ route('articles.index') }}"
                            class="text-green-700 font-medium flex items-center gap-1 hover:underline">
                            Read More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

</body>

</html>
