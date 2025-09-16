<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intan Safety</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <!-- Tambahkan Swiper.js untuk slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body class="bg-white text-blue-950 font-metropolis">

    <!-- Navbar -->
    <nav class="bg-white relative top-0 shadow-sm w-full z-50">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-16">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Intan Safety" class="h-8 mr-2">
                <span class="font-bold text-lg text-[#144F5F]">INTAN SAFETY</span>
            </a>

            <!-- Menu Desktop -->
            <div class="hidden lg:flex space-x-8">
                <!-- Tentang Kami -->
                <div class="relative group">
                    <button
                        class="hover:text-[#73BA7D] font-light transition-colors duration-300 flex items-center gap-1">
                        TENTANG KAMI
                        <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform duration-300"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-2 w-[220px] bg-white shadow-lg rounded-lg border opacity-0 invisible 
               group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out 
               transform translate-y-2 group-hover:translate-y-0 px-6 py-4">

                        <div class="flex flex-col space-y-3">
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Tentang
                                Perusahaan</a>
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Hubungi Kami</a>
                        </div>
                    </div>
                </div>

                <!-- Layanan -->
                <div class="relative group">
                    <button
                        class="hover:text-[#73BA7D] font-light transition-colors duration-300 flex items-center gap-1">
                        LAYANAN
                        <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform duration-300"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-2 w-[500px] bg-white shadow-lg rounded-lg border opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out transform translate-y-2 group-hover:translate-y-0 grid grid-cols-2 gap-6 p-6">
                        <div class="flex flex-col space-y-3">
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Sertifikasi
                                Kemnaker RI</a>
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Sertifikasi
                                BNSP</a>
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Non Sertifikasi</a>
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">ESDM</a>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">PPSDM Migas</a>
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Riksa Uji</a>
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Perpanjangan SIO &
                                Lisensi</a>
                        </div>
                    </div>
                </div>

                <!-- Informasi -->
                <div class="relative group">
                    <button
                        class="hover:text-[#73BA7D] font-light transition-colors duration-300 flex items-center gap-1">
                        INFORMASI
                        <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform duration-300"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-2 w-[400px] bg-white shadow-lg rounded-lg border opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out transform translate-y-2 group-hover:translate-y-0 grid grid-cols-2 gap-6 p-6">
                        <div class="flex flex-col space-y-3">
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Schedule</a>
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Legalitas</a>
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Cek Sertifikat</a>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Artikel</a>
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Galeri
                                Pembinaan</a>
                        </div>
                    </div>
                </div>

                <!-- Contact -->
                <a href="#" class="hover:text-[#73BA7D] font-light transition-colors duration-300">CONTACT</a>
            </div>

            <!-- Button Desktop -->
            <div class="hidden lg:flex">
                <a href="#"
                    class="bg-[#73BA7D] text-white px-6 py-2 rounded-full font-medium hover:bg-opacity-90 transition duration-300 flex items-center space-x-2">
                    Get An Appointment
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {{-- tanda → → pada Get An Appointment --}}
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden text-gray-700 hover:text-[#73BA7D] focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden bg-white border-t border-gray-200">
            <div class="px-4 pt-2 pb-3 space-y-1">
                <!-- Mobile Tentang Kami -->
                <div class="block">
                    <button
                        class="mobile-dropdown-btn w-full text-left text-gray-700 hover:text-[#73BA7D] font-medium px-3 py-2 flex items-center justify-between"
                        data-target="mobile-about">
                        <span>TENTANG KAMI</span>
                        <svg class="w-4 h-4 transform transition-transform duration-300" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="mobile-about" class="hidden pl-6 space-y-1">
                        <a href="#"
                            class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Tentang
                            Perusahaan</a>
                        <a href="#"
                            class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Hubungi Kami</a>
                    </div>
                </div>

                <!-- Mobile Layanan -->
                <div class="block">
                    <button
                        class="mobile-dropdown-btn w-full text-left text-gray-700 hover:text-[#73BA7D] font-medium px-3 py-2 flex items-center justify-between"
                        data-target="mobile-services">
                        <span>LAYANAN</span>
                        <svg class="w-4 h-4 transform transition-transform duration-300" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="mobile-services" class="hidden pl-6 space-y-1">
                        <a href="#"
                            class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Sertifikasi
                            Kemnaker RI</a>
                        <a href="#"
                            class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Sertifikasi
                            BNSP</a>
                        <a href="#" class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Non
                            Sertifikasi</a>
                        <a href="#"
                            class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">ESDM</a>
                        <a href="#"
                            class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">PPSDM Migas</a>
                        <a href="#"
                            class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Riksa Uji</a>
                        <a href="#"
                            class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Perpanjangan SIO &
                            Lisensi</a>
                    </div>
                </div>

                <!-- Mobile Informasi -->
                <div class="block">
                    <button
                        class="mobile-dropdown-btn w-full text-left text-gray-700 hover:text-[#73BA7D] font-medium px-3 py-2 flex items-center justify-between"
                        data-target="mobile-info">
                        <span>INFORMASI</span>
                        <svg class="w-4 h-4 transform transition-transform duration-300" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="mobile-info" class="hidden pl-6 space-y-1">
                        <a href="#"
                            class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Schedule</a>
                        <a href="#"
                            class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Legalitas</a>
                        <a href="#" class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Cek
                            Sertifikat</a>
                        <a href="#"
                            class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Artikel</a>
                        <a href="#"
                            class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Galeri
                            Pembinaan</a>
                    </div>
                </div>

                <!-- Mobile Contact -->
                <a href="#"
                    class="block text-gray-700 hover:text-[#73BA7D] font-medium px-3 py-2 transition-colors">CONTACT</a>

                <!-- Mobile Button -->
                <div class="px-3 py-2">
                    <a href="#"
                        class="block w-full text-center bg-[#73BA7D] text-white px-4 py-2 rounded-full font-medium hover:bg-[#5fa467] transition-colors duration-300">
                        Get An Appointment →
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section
        class="relative bg-[#144F5F] rounded-[40px] mx-4 sm:mx-6 lg:mx-8 mt-6 px-6 sm:px-10 lg:px-12 py-8 sm:py-12 lg:py-16 flex flex-col lg:flex-row items-center justify-between overflow-hidden min-h-[400px] lg:min-h-[500px]">

        <!-- Text Content -->
        <div class="text-white max-w-xl mb-8 lg:mb-0 z-10">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mb-8 tracking-wide">
                SAFETY, QUALITY & <br />COMPETENT
            </h1>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 sm:gap-6">
                <!-- Button Outline -->
                <a href="#"
                    class="px-6 py-3 border border-white rounded-full hover:bg-white hover:text-[#144F5F] transition-all duration-300 w-full sm:w-auto text-center flex items-center justify-center gap-2">
                    <span>Cek Legalitas Kami</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                <!-- Button with Icon -->
                <a href="#"
                    class="flex items-center justify-center gap-2 text-white hover:text-gray-200 transition-colors duration-300 w-full sm:w-auto">
                    <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                        </svg>
                    </div>
                    <span class="font-medium">Jadwal 2025</span>
                </a>
            </div>
        </div>

        <!-- Image + Circle -->
        <div
            class="relative w-full max-w-[400px] sm:max-w-[500px] lg:w-[600px] lg:h-[520px] flex items-end justify-center">
            <!-- Circle Background -->
            <div
                class="absolute bottom-[-150px] sm:bottom-[-180px] right-10 sm:right-[40px] w-[300px] sm:w-[380px] lg:w-[460px] h-[300px] sm:h-[380px] lg:h-[460px] bg-[#73BA7D] rounded-full z-0 opacity-15">
            </div>
            <!-- Image -->
            <img src="{{ asset('images/hero1.png') }}" alt="Hero Image"
                class="relative z-10 w-[260px] sm:w-[360px] lg:w-[460px] object-contain" />
        </div>

        <!-- Background Shape for better visual -->
        <div
            class="absolute right-[-15%] top-1/2 transform -translate-y-1/2 w-[70%] h-[140%] bg-[#73BA7D] rounded-full opacity-10 z-0">
        </div>
    </section>

    <!-- Section : Program Pelatihan Unggulan Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
            <div class="mb-6 md:mb-0">
                <h2 class="text-3xl font-bold text-[#144F5F]">Program Pelatihan Unggulan</h2>
                <p class="text-gray-600 mt-2">Pilih program pelatihan sesuai kebutuhan Anda</p>
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
                                    <div class="flex justify-between items-center">
                                        <span class="text-[#73BA7D] font-bold">Rp 2.500.000</span>
                                        <span class="text-[#73BA7D] font-bold">Rp 2.500.000</span>
                                        <a href="#"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
                                            Detail
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
                                        <span class="text-[#73BA7D] font-bold">Rp 2.800.000</span>
                                        <a href="#"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
                                            Detail
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
                                        <span class="text-[#73BA7D] font-bold">Rp 3.200.000</span>
                                        <a href="#"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
                                            Detail
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
                                        <span class="text-[#73BA7D] font-bold">Rp 3.500.000</span>
                                        <a href="#"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
                                            Detail
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
                                        <span class="text-[#73BA7D] font-bold">Rp 4.000.000</span>
                                        <a href="#"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
                                            Detail
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
                        <svg class="w-6 h-6 text-[#144F5F]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                    <div
                        class="swiper-button-prev absolute top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg rounded-full flex items-center justify-center w-12 h-12 -left-6">
                        <svg class="w-6 h-6 text-[#144F5F]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7"></path>
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
                                        <a href="#"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
                                            Detail
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
                                        <a href="#"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
                                            Detail
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
                                        <a href="#"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
                                            Detail
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
                        <svg class="w-6 h-6 text-[#144F5F]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                    <div
                        class="swiper-button-prev absolute top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg rounded-full flex items-center justify-center w-12 h-12 -left-6">
                        <svg class="w-6 h-6 text-[#144F5F]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7"></path>
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
                                        <a href="#"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
                                            Detail
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
                                        <a href="#"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
                                            Detail
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
                                        <a href="#"
                                            class="text-sm text-[#144F5F] hover:text-[#73BA7D] font-medium flex items-center">
                                            Detail
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
                        <svg class="w-6 h-6 text-[#144F5F]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                    <div
                        class="swiper-button-prev absolute top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg rounded-full flex items-center justify-center w-12 h-12 -left-6">
                        <svg class="w-6 h-6 text-[#144F5F]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Legalitas Terjamin, Kualitas Terbukti -->
    <section class="py-12 px-4 md:px-8 lg:px-16 max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row gap-10 items-start">
            <!-- Bagian Kiri: Teks dan Kotak-kotak -->
            <div class="lg:w-1/2">
                <h2 class="text-3xl md:text-4xl font-bold text-[#144F5F] mb-6">
                    Legalitas Terjamin, Kualitas Terbukti
                </h2>
                <p class="text-[#000] mb-8 leading-relaxed">
                    Kami lahir sebagai mitra terpercaya dalam pembinaan & pelatihan K3 dengan legalitas resmi Kemnaker
                    RI & Kemenkumham. Mengutamakan kualitas, pengalaman, serta pelayanan terbaik untuk mencetak tenaga
                    kerja yang kompeten dan siap menghadapi tantangan di dunia industri.
                </p>

                <!-- Grid Kotak-kotak -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kotak 1: Instruktur Berpengalaman -->
                    <div class="bg-white p-6 rounded-lg shadow-sm feature-card">
                        <h3 class="text-xl font-semibold text-custom-blue mb-3">INSTRUKTUR BERPENGALAMAN</h3>
                        <ul class="text-gray-900 space-y-2">
                            <li class="flex items-start">
                                <span class="text-custom-green mt-1 mr-2"><i class="fas fa-check"></i></span>
                                <span>Dibimbing oleh berbagai trainer</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-custom-green mt-1 mr-2"><i class="fas fa-check"></i></span>
                                <span>Bersertifikasi dan professional</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Kotak 2: Harga Kompetitif -->
                    <div class="bg-white p-6 rounded-lg shadow-sm feature-card">
                        <h3 class="text-xl font-semibold text-custom-blue mb-3">HARGA KOMPETITIF</h3>
                        <ul class="text-gray-900 space-y-2">
                            <li class="flex items-start">
                                <span class="text-custom-green mt-1 mr-2"><i class="fas fa-check"></i></span>
                                <span>Harga kompetitif dengan kualitas pelatihan terbaik</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Kotak 3: PJK3 Resmi -->
                    <div class="bg-white p-6 rounded-lg shadow-sm feature-card">
                        <h3 class="text-xl font-semibold text-custom-blue mb-3">PJK3 RESMI</h3>
                        <ul class="text-gray-900 space-y-2">
                            <li class="flex items-start">
                                <span class="text-custom-green mt-1 mr-2"><i class="fas fa-check"></i></span>
                                <span>PJK3 Resmi diunjuk KEMNAKER RI dan BNSP</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Kotak 4: Kelas Training Terlengkap -->
                    <div class="bg-white p-6 rounded-lg shadow-sm feature-card">
                        <h3 class="text-xl font-semibold text-custom-blue mb-3">KELAS TRAINING TERLENGKAP</h3>
                        <ul class="text-gray-900 space-y-2">
                            <li class="flex items-start">
                                <span class="text-custom-green mt-1 mr-2"><i class="fas fa-check"></i></span>
                                <span>100+ pilihan pelatihan berbasis</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-custom-green mt-1 mr-2"><i class="fas fa-check"></i></span>
                                <span>sertifikasi KEMNAKER RI, BNSP, Non Sertifikasi, dll</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Bagian Kanan: Video YouTube -->
            <div class="lg:w-1/2">
                <div class="video-wrapper">
                    <div class="w-full">
                        <div class="youtube-container">
                            <div class="relative pb-[56.25%] h-0"> <!-- Aspect ratio 16:9 -->
                                <iframe class="absolute top-0 left-0 w-full h-full"
                                    src="https://www.youtube.com/embed/yrtJ1GMbRr0" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                        <p class="mt-4 text-center text-gray-600 font-medium">
                            JANUARI RECAP 2024 | Pelatihan & Sertifikasi K3 | Intan Safety Jogja
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Logo Client -->
    <div class="overflow-hidden bg-white py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <h2 class="text-center text-lg font-semibold leading-8 text-gray-900 mb-12">
                Dipercaya oleh perusahaan terkemuka
            </h2>

            {{-- Logo Carousel Container --}}
            <div class="relative overflow-hidden">
                <div class="flex animate-scroll space-x-16 items-center">
                    {{-- First set of logos --}}
                    <div class="flex space-x-16 items-center shrink-0">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/agincourt.png') }}" alt="Company 1">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/ahm.png') }}" alt="Company 2">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/antam.png') }}" alt="Company 3">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/asc.webp') }}" alt="Company 4">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/bhumi.png') }}" alt="Company 5">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/cirebon.png') }}" alt="Company 6">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/honda.jpg') }}" alt="Company 7">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/huayue.png') }}" alt="Company 8">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/indonesia-power.png') }}" alt="Company 9">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/kai.png') }}" alt="Company 10">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/pindad.png') }}" alt="Company 11">
                    </div>

                    {{-- Duplicate set for seamless loop --}}
                    <div class="flex space-x-16 items-center shrink-0">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/agincourt.png') }}" alt="Company 1">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/ahm.png') }}" alt="Company 2">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/antam.png') }}" alt="Company 3">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/asc.webp') }}" alt="Company 4">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/bhumi.png') }}" alt="Company 5">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/cirebon.png') }}" alt="Company 6">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/honda.jpg') }}" alt="Company 7">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/huayue.png') }}" alt="Company 8">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/indonesia-power.png') }}" alt="Company 9">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/kai.png') }}" alt="Company 10">
                        <img class="h-12 w-auto object-contain  transition-all duration-300"
                            src="{{ asset('images/logos/pindad.png') }}" alt="Company 11">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section: Alumni -->
    <section class="py-12 bg-[#F5F9F4]">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Bagian atas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <!-- Card kiri -->
                <div class="relative bg-[#73BA7D] rounded-2xl overflow-hidden h-72 flex items-end justify-center">
                    <img src="{{ asset('images/hero.png') }}" alt="Alumni"
                        class="h-full object-bottom object-contain">
                </div>

                <!-- Card tengah -->
                <div class="bg-white rounded-2xl p-6 flex flex-col justify-center">
                    <div class="flex items-center justify-center mb-3">
                        <div
                            class="w-10 h-10 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                            <i class="fas fa-hard-hat text-xl"></i> <!-- icon pekerja -->
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-[#144F5F] text-center mb-2">
                        Ribuan Alumni Percaya
                    </h3>
                    <p class="text-gray-600 text-center text-sm">
                        Pelatihan K3 kami telah meluluskan banyak peserta yang kini berkontribusi di berbagai bidang
                        kerja.
                    </p>
                </div>

                <!-- Card kanan -->
                <div class="bg-[#73BA7D] rounded-2xl flex flex-col justify-center items-center p-6 h-72">
                    <img src="{{ asset('images/logo.png') }}" alt="Safety Quality"
                        class="w-20 h-20 object-contain mx-auto mb-3">
                    <h4 class="text-[#144F5F] font-bold text-base text-center leading-tight">
                        #SAFETY <br> QUALITY <br> COMPETENT
                    </h4>
                </div>
            </div>

            <!-- Bagian bawah (counter) -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                <div class="p-6 bg-white rounded-xl shadow-md">
                    <h2 class="text-3xl font-bold text-[#144F5F] counter" data-target="4000">0</h2>
                    <p class="text-[#73BA7D] font-semibold">Alumni</p>
                </div>

                <div class="p-6 bg-white rounded-xl shadow-md">
                    <h2 class="text-3xl font-bold text-[#144F5F] counter" data-target="352">0</h2>
                    <p class="text-green-600 font-semibold">Pembinaan</p>
                </div>

                <div class="p-6 bg-white rounded-xl shadow-md">
                    <h2 class="text-3xl font-bold text-[#144F5F] counter" data-target="500">0</h2>
                    <p class="text-green-600 font-semibold">Loyal Customer & Perusahaan</p>
                </div>

                <div class="p-6 bg-white rounded-xl shadow-md">
                    <h2 class="text-3xl font-bold text-[#144F5F] counter" data-target="352">0</h2>
                    <p class="text-green-600 font-semibold">Pembinaan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Apa Kata Mereka -->
    {{-- <section class="py-16 bg-[#F5F9F4]">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-[#144F5F] mb-10">
            What They Say About Us
        </h2>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse($reviews as $review)
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ $review['profile_photo_url'] ?? 'https://via.placeholder.com/50' }}" 
                             alt="{{ $review['author_name'] ?? 'Anonymous' }}"
                             class="w-12 h-12 rounded-full object-cover mr-3">
                        <div>
                            <h4 class="font-semibold text-[#144F5F]">
                                {{ $review['author_name'] ?? 'Anonymous' }}
                            </h4>
                            <p class="text-sm text-gray-500">
                                ⭐ {{ $review['rating'] ?? '-' }}/5
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        {{ $review['text'] ?? '' }}
                    </p>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-3">Belum ada review.</p>
            @endforelse
        </div> --}}
    {{-- </div>
</section> --}}

    <!-- Section: Galeri -->
    <!-- Galeri Pembinaan -->
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
                    <h2 class="mt-2 text-3xl font-bold text-[#144F5F] leading-snug">
                        Mengabadikan Moment <br> Bersama Alumni
                    </h2>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="overflow-hidden rounded-lg shadow">
                    <img src="https://via.placeholder.com/400x250" alt="gallery"
                        class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="overflow-hidden rounded-lg shadow">
                    <img src="https://via.placeholder.com/400x250" alt="gallery"
                        class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="overflow-hidden rounded-lg shadow">
                    <img src="https://via.placeholder.com/400x250" alt="gallery"
                        class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="overflow-hidden rounded-lg shadow">
                    <img src="https://via.placeholder.com/400x250" alt="gallery"
                        class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="overflow-hidden rounded-lg shadow">
                    <img src="https://via.placeholder.com/400x250" alt="gallery"
                        class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="overflow-hidden rounded-lg shadow">
                    <img src="https://via.placeholder.com/400x250" alt="gallery"
                        class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="overflow-hidden rounded-lg shadow">
                    <img src="https://via.placeholder.com/400x250" alt="gallery"
                        class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="overflow-hidden rounded-lg shadow">
                    <img src="https://via.placeholder.com/400x250" alt="gallery"
                        class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                </div>
            </div>

            <!-- Button -->
            <div class="text-center mt-10">
                <a href="#"
                    class="px-6 py-2 bg-teal-800 text-white rounded-md shadow hover:bg-teal-900 transition-colors">
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
                    <h2 class="mt-2 text-3xl font-bold text-[#144F5F] leading-snug">
                        Journeys of Discovery <br> Uncovering Hidden
                    </h2>
                </div>
            </div>

            <!-- Blog Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                    <img src="https://via.placeholder.com/500x300" alt="Blog image" class="w-full h-56 object-cover">
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
                        <a href="#" class="text-green-700 font-medium flex items-center gap-1 hover:underline">
                            Read More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                    <img src="https://via.placeholder.com/500x300" alt="Blog image" class="w-full h-56 object-cover">
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
                        <a href="#" class="text-green-700 font-medium flex items-center gap-1 hover:underline">
                            Read More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                    <img src="https://via.placeholder.com/500x300" alt="Blog image" class="w-full h-56 object-cover">
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
                        <a href="#" class="text-green-700 font-medium flex items-center gap-1 hover:underline">
                            Read More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-6 grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Branch Office -->
            <div>
                <h3 class="text-lg font-bold mb-2">BRANCH OFFICE</h3>
                <p class="text-sm leading-relaxed mb-3">
                    Jl. Panggungan Asri No.37, RT.003/RW.033, Mayaan, Trihanggo,<br>
                    Kec. Gamping, Kab. Sleman, Daerah Istimewa Yogyakarta 55291
                </p>

                <h3 class="text-lg font-bold mb-2">SOCIAL MEDIA</h3>
                <div class="flex gap-3 text-lg">
                    <a href="#" class="hover:text-gray-300"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="hover:text-gray-300"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#" class="hover:text-gray-300"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="hover:text-gray-300"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>

            <!-- Contact Us -->
            <div>
                <h3 class="text-lg font-bold mb-2">CONTACT US</h3>
                <ul class="space-y-1 text-sm">
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-envelope"></i>
                        <a href="mailto:admin@intancahayamandiri.com" class="hover:underline">
                            admin@intancahayamandiri.com
                        </a>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-phone"></i>
                        <span>0274-4297535</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span>0813 2718 1389</span>
                    </li>
                </ul>
            </div>

            <!-- Bantuan -->
            <div>
                <h3 class="text-lg font-bold mb-2">BANTUAN</h3>
                <ul class="space-y-1 text-sm">
                    <li><a href="#" class="hover:underline">Hubungi Kami</a></li>
                    <li><a href="#" class="hover:underline">Syarat & Ketentuan</a></li>
                    <li><a href="#" class="hover:underline">FAQ</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-white/20 py-3 text-center text-xs">
            Copyright 2025 - <span class="font-semibold">Intan Safety Jogja</span>
        </div>
    </footer>

</body>

</html>
