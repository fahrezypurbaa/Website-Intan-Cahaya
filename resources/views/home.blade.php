<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intan Safety</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-white text-blue-950 font-metropolis">

    <!-- Navbar -->
    <nav class="bg-white sticky top-0 shadow-sm w-full z-50">
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
                        class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-lg border opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out transform translate-y-2 group-hover:translate-y-0">
                        <a href="#"
                            class="block px-4 py-3 text-sm hover:bg-[#73BA7D] hover:text-white transition-colors border-b border-gray-100 last:border-b-0">Tentang
                            Perusahaan</a>
                        <a href="#"
                            class="block px-4 py-3 text-sm hover:bg-[#73BA7D] hover:text-white transition-colors">Hubungi
                            Kami</a>
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
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

    <!-- Program Section -->
    {{-- <section class="py-12 sm:py-16 max-w-7xl mx-auto px-4 sm:px-6">
        <div class="mb-8">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#144F5F] mb-4">Program Pelatihan Unggulan</h2>
            <p class="text-gray-600 text-lg">Pilih Pelatihan yang sesuai dengan kompetensi anda</p>
        </div>

        <div class="flex flex-wrap gap-3 sm:gap-4">
            <button
                class="training-btn active px-6 py-3 rounded-full bg-[#73BA7D] text-white font-semibold hover:bg-[#5fa467] transition-all duration-300 border-2 border-[#73BA7D]">
                Kemnaker RI
            </button>
            <button
                class="training-btn px-6 py-3 rounded-full border-2 border-[#73BA7D] text-[#73BA7D] hover:bg-[#73BA7D] hover:text-white transition-all duration-300 font-medium">
                BNSP
            </button>
            <button
                class="training-btn px-6 py-3 rounded-full border-2 border-[#73BA7D] text-[#73BA7D] hover:bg-[#73BA7D] hover:text-white transition-all duration-300 font-medium">
                Soft Skill
            </button>
        </div>
    </section> --}}

    <script>
        // Toggle Mobile Menu
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Mobile Dropdown Toggle
        document.querySelectorAll('.mobile-dropdown-btn').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const dropdown = document.getElementById(targetId);
                const arrow = this.querySelector('svg');

                dropdown.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            });
        });

        // Training Button Interactions
        document.querySelectorAll('.training-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.training-btn').forEach(btn => {
                    btn.classList.remove('active', 'bg-[#73BA7D]', 'text-white');
                    btn.classList.add('text-[#73BA7D]');
                });

                // Add active class to clicked button
                this.classList.add('active', 'bg-[#73BA7D]', 'text-white');
                this.classList.remove('text-[#73BA7D]');
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');

            if (!mobileMenu.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white', 'bg-opacity-95', 'backdrop-blur-sm');
            } else {
                navbar.classList.remove('bg-opacity-95', 'backdrop-blur-sm');
            }
        });
    </script>

</body>

</html>