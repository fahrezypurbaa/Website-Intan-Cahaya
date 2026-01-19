@extends('layouts.app')

@section('title', 'Hubungi Kami Intan Safety Jogja | Kontak Resmi & Lokasi Kantor')

@section('meta_description',
    'Hubungi Intan Safety Jogja untuk informasi pelatihan dan sertifikasi K3 Kemenaker RI,
    BNSP, dan non-sertifikasi. Tersedia kontak telepon, email, alamat kantor, dan formulir online.')

@section('canonical', url('/hubungi-kami'))

@section('content')
    {{-- ================= HERO / BANNER ================= --}}
    <section class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Hubungi Intan Safety Jogja"
            class="w-full h-40 sm:h-56 md:h-72 lg:h-80 xl:h-96 object-cover">

        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/80 to-[#73BA7D]/70 flex items-center justify-center">
            <h1 class="text-xl sm:text-2xl md:text-4xl lg:text-5xl font-extrabold text-white drop-shadow text-center px-4">
                Hubungi Kami
            </h1>
        </div>
    </section>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        {{-- ================= INTRO KONTEN ================= --}}
        <section class="max-w-3xl mx-auto text-center mb-12">
            <p class="text-gray-700 leading-relaxed">
                <strong>Intan Safety Jogja</strong> siap membantu kebutuhan
                <strong>pelatihan dan sertifikasi K3</strong> bagi individu maupun perusahaan.
                Silakan hubungi kami untuk mendapatkan informasi jadwal pelatihan,
                skema sertifikasi <strong>Kemenaker RI</strong>, <strong>BNSP</strong>,
                serta layanan konsultasi K3 yang profesional dan terpercaya.
            </p>
        </section>

        {{-- ================= KONTAK & FORM ================= --}}
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            {{-- Informasi Kontak --}}
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-md">
                <h2 class="text-2xl font-bold text-[#144F5F] mb-6">
                    Informasi Kontak
                </h2>

                <ul class="space-y-6">
                    <li class="flex items-start sm:items-center space-x-4">
                        <div
                            class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Jam Operasional</p>
                            <p class="text-sm text-gray-700">Senin – Jumat (08.00 – 16.30)</p>
                        </div>
                    </li>

                    <li class="flex items-start sm:items-center space-x-4">
                        <div
                            class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Telepon</p>
                            <p class="text-sm text-gray-700">0821-4613-4846</p>
                        </div>
                    </li>

                    <li class="flex items-start sm:items-center space-x-4">
                        <div
                            class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Email</p>
                            <p class="text-sm text-gray-700 break-all">admin@intansafetyk3.com</p>
                        </div>
                    </li>

                    <li class="flex items-start space-x-4">
                        <div
                            class="w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-[#73BA7D]/20 text-[#144F5F]">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Alamat Kantor</p>
                            <p class="text-sm text-gray-700">
                                Jl. Panggungan Asri No.37, RT.003/RW.033, Mayaan, Trihanggo, Gamping,<br>
                                Kabupaten Sleman, Yogyakarta 55291
                            </p>
                        </div>
                    </li>
                </ul>
            </div>

            {{-- Formulir Kontak --}}
            <div class="bg-[#144F5F]/5 p-6 sm:p-8 rounded-2xl shadow-md">
                <h2 class="text-2xl font-bold text-[#144F5F] mb-6">
                    Kirim Pesan
                </h2>

                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-[#144F5F] mb-1">Nama</label>
                        <input type="text" name="nama" required
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#73BA7D]">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#144F5F] mb-1">Email</label>
                        <input type="email" name="email" required
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#73BA7D]">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#144F5F] mb-1">Telepon</label>
                        <input type="text" name="telepon"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#73BA7D]">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#144F5F] mb-1">Pesan</label>
                        <textarea name="pesan" rows="4" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#73BA7D]"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white font-semibold rounded-lg hover:opacity-90 transition">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </section>

        {{-- ================= MAP ================= --}}
        <section class="mt-16">
            <h2 class="text-2xl font-bold text-center text-[#144F5F] mb-6">
                Lokasi Kantor Intan Safety Jogja
            </h2>

            <div class="w-full h-60 sm:h-72 md:h-80 lg:h-96 rounded-lg overflow-hidden shadow-md">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.207058362356!2d110.3480014!3d-7.7678544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a596b3d0c6d2d%3A0xf17c39d1f640532a!2sPusat%20Pelatihan%20K3%20%7C%20Intan%20Safety%20Jogja!5e0!3m2!1sen!2sid!4v1765764266985!5m2!1sen!2sid"
                    class="w-full h-full border-0" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>

    </main>
@endsection
