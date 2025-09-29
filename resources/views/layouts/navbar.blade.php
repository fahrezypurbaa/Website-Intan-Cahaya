<!-- 🔹 Topbar -->
<div class="bg-gray-100 border-b border-gray-200 text-sm w-full">
  <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between px-4 py-2 gap-2 sm:gap-0">
    
    <!-- Kiri -->
    <div class="flex items-center space-x-2 text-gray-900">
      <!-- Icon Jam -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none">
        <defs>
          <linearGradient id="iconGradient" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#16a34a" />
            <stop offset="100%" stop-color="#06b6d4" />
          </linearGradient>
        </defs>
        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" 
              stroke="url(#iconGradient)" stroke-width="2" 
              stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <span class="truncate">Senin - Jum'at: 08.00 - 16.30</span>
    </div>

    <!-- Kanan -->
    <div class="flex items-center space-x-4 text-gray-700">
      
      <!-- Telepon -->
      <div class="flex items-center space-x-1 min-w-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none">
          <defs>
            <linearGradient id="phoneGradient" x1="0" y1="0" x2="1" y2="1">
              <stop offset="0%" stop-color="#16a34a" />
              <stop offset="100%" stop-color="#06b6d4" />
            </linearGradient>
          </defs>
          <path d="M3 5a2 2 0 012-2h2.28a1 1 0 01.948.684l1.2 3.6a1 1 0 01-.272 1.06l-1.67 1.67a16.001 16.001 0 006.586 6.586l1.67-1.67a1 1 0 011.06-.272l3.6 1.2a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" 
                stroke="url(#phoneGradient)" stroke-width="2" 
                stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span class="truncate max-w-[120px] sm:max-w-none">082146134846</span>
      </div>
      
      <!-- Email -->
      <div class="flex items-center space-x-1 min-w-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none">
          <defs>
            <linearGradient id="mailGradient" x1="0" y1="0" x2="1" y2="1">
              <stop offset="0%" stop-color="#16a34a" />
              <stop offset="100%" stop-color="#06b6d4" />
            </linearGradient>
          </defs>
          <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" 
                stroke="url(#mailGradient)" stroke-width="2" 
                stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span class="truncate max-w-[150px] sm:max-w-none">admin@intancahayamandiri.com</span>
      </div>
    </div>
  </div>
</div>

<!-- 🔹 Navbar -->
<header class="shadow-md">
    <nav class="bg-white relative top-0 shadow-sm w-full z-50">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-16">
            <!-- Logo -->
            <a href="/" class="flex items-center ml-4">
                <!-- Logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Intan Safety" class="h-12 w-12 object-contain mr-2">

                <!-- Teks -->
                <div class="flex flex-col leading-tight">
                    <!-- Gradient text -->
                    <span
                        class="font-semibold text-base bg-gradient-to-r from-[#144F5F] to-[#73BA7D] bg-clip-text text-transparent">
                        Intan Safety Jogja
                    </span>
                    <span class="text-[10px] text-gray-600">PT. Intan Cahaya Mandiri</span>
                </div>
            </a>

            <!-- Menu Desktop -->
            <div class="hidden lg:flex space-x-8">
                <!-- Tentang Kami -->
                <div class="relative group">
                    <button
                        class="hover:text-[#73BA7D] font-light transition-colors duration-300 flex items-center gap-1">
                        Tentang Kami
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
                            <a href="{{ route('hubungi-kami') }}"
                                class="text-sm hover:text-[#73BA7D] transition-colors">Hubungi
                                Kami</a>
                        </div>
                    </div>
                </div>

                <!-- Layanan -->
                <div class="relative group">
                    <button
                        class="hover:text-[#73BA7D] font-light transition-colors duration-300 flex items-center gap-1">
                        Layanan
                        <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform duration-300"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-2 w-[500px] bg-white shadow-lg rounded-lg border opacity-0 invisible 
                        group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out 
                        transform translate-y-2 group-hover:translate-y-0 grid grid-cols-2 gap-6 p-6">
                        <div class="flex flex-col space-y-3">
                            <a href="{{ route('layanan.index', ['category' => 'sertifikasi-kemnaker-ri']) }}"
                                class="text-sm hover:text-[#73BA7D] transition-colors">Sertifikasi
                                Kemnaker RI</a>
                            <a href="{{ route('layanan.index', ['category' => 'sertifikasi-bnsp']) }}"
                                class="text-sm hover:text-[#73BA7D] transition-colors">Sertifikasi
                                BNSP</a>
                            <a href="{{ route('layanan.index', ['category' => 'non-sertifikasi']) }}"
                                class="text-sm hover:text-[#73BA7D] transition-colors">Non Sertifikasi</a>
                            <a href="{{ route('layanan.index', ['category' => 'esdm']) }}"
                                class="text-sm hover:text-[#73BA7D] transition-colors">ESDM</a>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <a href="{{ route('layanan.index', ['category' => 'ppsdm-migas']) }}"
                                class="text-sm hover:text-[#73BA7D] transition-colors">PPSDM Migas</a>
                            <a href="{{ route('layanan.index', ['category' => 'riksa-uji']) }}"
                                class="text-sm hover:text-[#73BA7D] transition-colors">Riksa Uji</a>
                            <a href="{{ route('layanan.index', ['category' => 'perpanjangan-sio-lisensi']) }}"
                                class="text-sm hover:text-[#73BA7D] transition-colors">Perpanjangan
                                SIO & Lisensi</a>
                        </div>
                    </div>
                </div>

                <!-- Informasi -->
                <div class="relative group">
                    <button
                        class="hover:text-[#73BA7D] font-light transition-colors duration-300 flex items-center gap-1">
                        Informasi
                        <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform duration-300"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-2 w-[400px] bg-white shadow-lg rounded-lg border opacity-0 invisible 
                        group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out 
                        transform translate-y-2 group-hover:translate-y-0 grid grid-cols-2 gap-6 p-6">
                        <div class="flex flex-col space-y-3">
                            <a href="{{ route('schedule') }}"
                                class="text-sm hover:text-[#73BA7D] transition-colors">Schedule</a>
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Legalitas</a>
                            <a href="#" class="text-sm hover:text-[#73BA7D] transition-colors">Cek
                                Sertifikat</a>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <a href="{{ route('articles.index') }}"
                                class="text-sm hover:text-[#73BA7D] transition-colors">Artikel</a>
                        </div>
                    </div>
                </div>

                <!-- Galeri Pembinaan -->
                <a href="{{ route('galeri') }}"
                    class="hover:text-[#73BA7D] font-light transition-colors duration-300">Galeri</a>
            </div>

            <!-- Button Desktop -->
            <div class="hidden lg:flex">
                <a href="#"
                    class="px-6 py-2 rounded-full font-medium text-white 
                    bg-gradient-to-r from-[#144F5F] to-[#73BA7D] 
                    hover:opacity-90 transition duration-300 flex items-center space-x-2">
                    Daftar Pelatihan
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
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
                    </div>
                </div>

                <!-- Mobile Contact -->
                <a href="{{ route('galeri') }}"
                    class="block text-gray-700 hover:text-[#73BA7D] font-medium px-3 py-2 transition-colors">GALERI</a>

                <!-- Mobile Button -->
                <div class="px-3 py-2">
                    <a href="#"
                        class="block w-full text-center text-white px-4 py-2 rounded-full font-medium 
                               bg-gradient-to-r from-[#144F5F] to-[#73BA7D] 
                               hover:opacity-90 transition duration-300">
                        Daftar Pelatihan →
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
