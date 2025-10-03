@extends('layouts.app')

@section('title', 'Jadwal Pelatihan 2025 - Intan Safety')

@section('content')

    {{-- Banner --}}
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" 
             alt="Jadwal Kami"
             class="w-full h-48 sm:h-56 md:h-72 lg:h-80 object-cover rounded-lg shadow-md">
        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/80 to-[#73BA7D]/80 flex items-center justify-center">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white drop-shadow">
                JADWAL PELATIHAN 2025
            </h1>
        </div>
    </div>

    <div class="max-w-6xl mx-auto py-12 px-4 sm:px-6">
        {{-- Ringkasan Highlight --}}
        <h2 class="text-2xl md:text-3xl font-bold text-center text-[#144F5F] mb-10">
            Ringkasan Jadwal Utama
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
            <div class="p-6 bg-white shadow rounded-xl hover:shadow-md transition">
                <h3 class="text-xl font-bold text-[#144F5F] mb-2">
                    <i class="fa-solid fa-thumbtack text-[#73BA7D]"></i> Januari
                </h3>
                <p class="text-gray-600 text-sm">Pelatihan Juru Las, K3 Umum</p>
            </div>
            <div class="p-6 bg-white shadow rounded-xl hover:shadow-md transition">
                <h3 class="text-xl font-bold text-[#144F5F] mb-2">
                    <i class="fa-solid fa-thumbtack text-[#73BA7D]"></i> Maret
                </h3>
                <p class="text-gray-600 text-sm">Pelatihan Forklift, Operator Crane</p>
            </div>
            <div class="p-6 bg-white shadow rounded-xl hover:shadow-md transition">
                <h3 class="text-xl font-bold text-[#144F5F] mb-2">
                    <i class="fa-solid fa-thumbtack text-[#73BA7D]"></i> Juli
                </h3>
                <p class="text-gray-600 text-sm">Pelatihan K3 Migas, Scaffolding</p>
            </div>
        </div>

        {{-- Judul PDF --}}
        <h2 class="text-2xl md:text-3xl font-bold mt-16 mb-6 text-center text-gray-800">
            Detail Jadwal Pelatihan 2025 (PDF)
        </h2>

        {{-- PDF Viewer --}}
        <div class="w-full h-[800px] md:h-[900px] border rounded shadow">
            <iframe src="{{ asset('files/jadwal-2025.pdf') }}" 
                    class="w-full h-full rounded" frameborder="0"></iframe>
        </div>

        {{-- Tombol download --}}
        <div class="mt-6 text-center">
            <a href="{{ asset('files/jadwal-2025.pdf') }}" download
               class="px-6 py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white font-semibold rounded-lg shadow hover:opacity-90 transition">
                <i class="fa-solid fa-download mr-2"></i> Download Jadwal PDF
            </a>
        </div>

        {{-- Call to Action --}}
        <div class="mt-16 text-center">
            <p class="text-gray-700 mb-4">Siap ikut pelatihan? Hubungi tim kami untuk informasi pendaftaran.</p>
            <a href="{{ url('/hubungi-kami') }}" 
               class="px-6 py-3 bg-[#73BA7D] text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
               <i class="fa-solid fa-phone mr-2"></i> Hubungi Kami
            </a>
        </div>

        {{-- FAQ --}}
        <div class="mt-20">
            <h3 class="text-xl md:text-2xl font-bold text-[#144F5F] mb-6 text-center">FAQ - Pertanyaan Umum</h3>
            <div class="space-y-4 max-w-3xl mx-auto">
                <div class="p-4 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h4 class="font-semibold text-[#144F5F]">Bagaimana cara mendaftar pelatihan?</h4>
                    <p class="text-gray-600 text-sm">Silakan hubungi tim kami melalui halaman <a href="{{ url('/hubungi-kami') }}" class="text-[#73BA7D] underline">Hubungi Kami</a> atau langsung klik tombol daftar di atas.</p>
                </div>
                <div class="p-4 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h4 class="font-semibold text-[#144F5F]">Apakah tersedia pelatihan online?</h4>
                    <p class="text-gray-600 text-sm">Ya, beberapa program kami tersedia secara online untuk memudahkan peserta dari luar kota.</p>
                </div>
                <div class="p-4 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h4 class="font-semibold text-[#144F5F]">Apakah mendapat sertifikat resmi?</h4>
                    <p class="text-gray-600 text-sm">Setiap peserta yang lulus akan mendapatkan sertifikat resmi dari Kemenaker RI atau BNSP sesuai jenis pelatihan.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
