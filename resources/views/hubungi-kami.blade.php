@extends('layouts.app')

@section('title', 'Hubungi Kami - Intan Safety')

@section('content')
    {{-- Banner --}}
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" 
             alt="Kontak Kami"
             class="w-full h-48 sm:h-56 md:h-72 lg:h-80 object-cover rounded-lg shadow-md">

        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/80 to-[#73BA7D]/70 flex items-center justify-center rounded-lg">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white drop-shadow">
                KONTAK KAMI
            </h1>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-12">
        <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-8">
            Kontak Informasi<br>
            <span class="text-[#73BA7D] text-lg font-medium">Hubungi kami segera</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Informasi Kontak --}}
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <ul class="space-y-6">
                    {{-- Jam --}}
                    <li class="flex items-center">
                        <span class="w-12 h-12 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F] mr-4">
                            <i class="fas fa-clock text-lg"></i>
                        </span>
                        <span class="text-gray-800 text-sm sm:text-base">Senin - Jumat (08.00 - 16.30)</span>
                    </li>

                    {{-- Telepon --}}
                    <li class="flex items-center">
                        <span class="w-12 h-12 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F] mr-4">
                            <i class="fas fa-phone-alt text-lg"></i>
                        </span>
                        <span class="text-gray-800 text-sm sm:text-base">082146134846</span>
                    </li>

                    {{-- Email --}}
                    <li class="flex items-center">
                        <span class="w-12 h-12 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F] mr-4">
                            <i class="fas fa-envelope text-lg"></i>
                        </span>
                        <span class="text-gray-800 text-sm sm:text-base">admin@intancahayamandiri.com</span>
                    </li>

                    {{-- Lokasi --}}
                    <li class="flex items-start">
                        <span class="w-12 h-12 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F] mr-4">
                            <i class="fas fa-map-marker-alt text-lg"></i>
                        </span>
                        <span class="text-gray-800 text-sm sm:text-base leading-relaxed">
                            Jl. Panggungan Asri No.37, RT.003/RW.033, Mayaan, Trihanggo, Gamping, <br>
                            Kabupaten Sleman, Yogyakarta 55291
                        </span>
                    </li>
                </ul>
            </div>

            {{-- Formulir --}}
            <div class="bg-[#144F5F]/5 p-6 rounded-2xl shadow-md">
                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-[#144F5F] mb-1">Nama</label>
                        <input type="text" name="nama"
                               class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#73BA7D] focus:border-[#73BA7D] text-sm sm:text-base"
                               required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#144F5F] mb-1">Email</label>
                        <input type="email" name="email"
                               class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#73BA7D] focus:border-[#73BA7D] text-sm sm:text-base"
                               required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#144F5F] mb-1">Telepon</label>
                        <input type="text" name="telepon"
                               class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#73BA7D] focus:border-[#73BA7D] text-sm sm:text-base">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#144F5F] mb-1">Pesan</label>
                        <textarea name="pesan" rows="4"
                                  class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#73BA7D] focus:border-[#73BA7D] text-sm sm:text-base"
                                  required></textarea>
                    </div>
                    <button type="submit"
                            class="w-full py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white font-semibold rounded-lg hover:opacity-90 transition">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        {{-- Google Maps --}}
        <div class="mt-12">
            <h3 class="text-xl font-bold text-center text-[#144F5F] mb-6">Lokasi Kami</h3>
            <div class="w-full h-64 sm:h-80 md:h-96 rounded-lg overflow-hidden shadow-md">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.200938662273!2d110.34327842318369!3d-7.768504581162453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a596b3d0c6d2d%3A0xf17c39d1f640532a!2sPT%20INTAN%20CAHAYA%20MANDIRI!5e0!3m2!1sid!2sid!4v1758184317801!5m2!1sid!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
@endsection
