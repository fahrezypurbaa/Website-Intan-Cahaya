    <!-- Navbar -->
    <header class="shadow-md">
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
                                <a href="{{ route('tentang.perusahaan') }}"
                                    class="text-sm hover:text-[#73BA7D] transition-colors">Tentang
                                    Perusahaan</a>

                                <a href="{{ route('hubungi-kami') }}" class="text-sm hover:text-[#73BA7D] transition-colors">Hubungi
                                    Kami</a>
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
                                <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Non
                                    Sertifikasi</a>
                                <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">ESDM</a>
                            </div>
                            <div class="flex flex-col space-y-3">
                                <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">PPSDM Migas</a>
                                <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Riksa Uji</a>
                                <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Perpanjangan
                                    SIO &
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
                                <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Cek
                                    Sertifikat</a>
                            </div>
                            <div class="flex flex-col space-y-3">
                                <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Artikel</a>
                            </div>
                        </div>
                    </div>

                    <!-- Galeri Pembinaan -->
                    <a href="#" class="hover:text-[#73BA7D] font-light transition-colors duration-300">GALERI</a>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16">
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
                            <a href="{{ route('tentang.perusahaan') }}"
                                class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Tentang
                                Perusahaan</a>
                            <a href="{{ route('hubungi-kami') }}"
                                class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Hubungi
                                Kami</a>
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
                            <a href="#"
                                class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Non
                                Sertifikasi</a>
                            <a href="#"
                                class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">ESDM</a>
                            <a href="#"
                                class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">PPSDM Migas</a>
                            <a href="#"
                                class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Riksa Uji</a>
                            <a href="#"
                                class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Perpanjangan
                                SIO &
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
                            <a href="#"
                                class="block text-gray-600 hover:text-[#73BA7D] py-2 transition-colors">Cek
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
    </header>
