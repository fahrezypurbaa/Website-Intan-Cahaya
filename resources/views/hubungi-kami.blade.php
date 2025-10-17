@extends('layouts.app')

@section('title', 'Hubungi Kami - Intan Safety')

@section('content')
    {{-- Banner --}}
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Kontak Kami"
            class="w-full h-40 sm:h-56 md:h-72 lg:h-80 xl:h-96 object-cover rounded-lg shadow-md">

        <!-- Overlay Gradient -->
        <div
            class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/80 to-[#73BA7D]/70 flex items-center justify-center rounded-lg">
            <h1 class="text-xl sm:text-2xl md:text-4xl lg:text-5xl font-extrabold text-white drop-shadow text-center px-4">
                KONTAK KAMI
            </h1>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-8 leading-tight">
            Kontak Informasi<br>
            <span class="text-[#73BA7D] text-base sm:text-lg font-medium">Hubungi kami segera</span>
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            {{-- Informasi Kontak --}}
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-md flex flex-col justify-center">
                <ul class="space-y-6">
                    {{-- Jam --}}
                    <li class="flex items-start sm:items-center space-x-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                            <i class="fas fa-clock text-base sm:text-lg"></i>
                        </div>
                        <div class="flex-1 text-gray-800 text-sm sm:text-base leading-relaxed">
                            <p class="font-semibold">Jam Operasional</p>
                            <p>Senin - Jumat (08.00 - 16.30)</p>
                        </div>
                    </li>

                    {{-- Telepon --}}
                    <li class="flex items-start sm:items-center space-x-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                            <i class="fas fa-phone-alt text-base sm:text-lg"></i>
                        </div>
                        <div class="flex-1 text-gray-800 text-sm sm:text-base leading-relaxed">
                            <p class="font-semibold">Telepon</p>
                            <p>0821-4613-4846</p>
                        </div>
                    </li>

                    {{-- Email --}}
                    <li class="flex items-start sm:items-center space-x-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                            <i class="fas fa-envelope text-base sm:text-lg"></i>
                        </div>
                        <div class="flex-1 text-gray-800 text-sm sm:text-base leading-relaxed break-all">
                            <p class="font-semibold">Email</p>
                            <p>admin@intancahayamandiri.com</p>
                        </div>
                    </li>

                    {{-- Lokasi --}}
                    <li class="flex items-start space-x-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                            <i class="fas fa-map-marker-alt text-base sm:text-lg"></i>
                        </div>
                        <div class="flex-1 text-gray-800 text-sm sm:text-base leading-relaxed">
                            <p class="font-semibold">Alamat</p>
                            <p>
                                Jl. Panggungan Asri No.37, RT.003/RW.033, Mayaan, Trihanggo, Gamping,<br>
                                Kabupaten Sleman, Yogyakarta 55291
                            </p>
                        </div>
                    </li>
                </ul>
            </div>

            {{-- Formulir --}}
            <div class="bg-[#144F5F]/5 p-6 sm:p-8 rounded-2xl shadow-md">
                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded text-sm sm:text-base">
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
                        class="w-full py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white font-semibold rounded-lg hover:opacity-90 transition duration-200 text-sm sm:text-base">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        {{-- Google Maps --}}
        <div class="mt-14">
            <h3 class="text-lg sm:text-xl font-bold text-center text-[#144F5F] mb-6">Lokasi Kami</h3>
            <div class="w-full h-60 sm:h-72 md:h-80 lg:h-96 rounded-lg overflow-hidden shadow-md">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.200938662273!2d110.34327842318369!3d-7.768504581162453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a596b3d0c6d2d%3A0xf17c39d1f640532a!2sPT%20INTAN%20CAHAYA%20MANDIRI!5e0!3m2!1sid!2sid!4v1758184317801!5m2!1sid!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
@endsection
