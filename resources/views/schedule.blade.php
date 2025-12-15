@extends('layouts.app')

@section('title', 'Jadwal Pelatihan K3 2025 Intan Safety Jogja | Sertifikasi Kemenaker & BNSP')

@section('meta_description',
    'Lihat jadwal lengkap pelatihan K3 Intan Safety Jogja tahun 2025. Tersedia pelatihan
    Kemenaker RI, BNSP, dan non-sertifikasi dengan instruktur berpengalaman.')

@section('canonical', url('/jadwal-pelatihan'))

@section('content')

    <!-- ================= HERO ================= -->
    <section class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Jadwal Pelatihan K3 Intan Safety Jogja Tahun 2025"
            width="1920" height="450" class="w-full h-48 sm:h-56 md:h-72 lg:h-80 object-cover">

        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/80 to-[#73BA7D]/80 flex items-center justify-center">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white drop-shadow text-center">
                Jadwal Pelatihan K3 Tahun 2025
            </h1>
        </div>
    </section>

    <main class="max-w-6xl mx-auto py-12 px-4 sm:px-6">

        <!-- ================= INTRO ================= -->
        <section class="mb-12 text-center max-w-3xl mx-auto">
            <p class="text-gray-700 leading-relaxed">
                <strong>Intan Safety Jogja</strong> menyelenggarakan berbagai program
                <strong>pelatihan dan sertifikasi K3</strong> sepanjang tahun 2025,
                meliputi <strong>Kemenaker RI</strong>, <strong>BNSP</strong>,
                serta <strong>pelatihan non-sertifikasi</strong>.
                Jadwal dirancang fleksibel untuk kebutuhan individu maupun perusahaan.
            </p>
        </section>

        <!-- ================= RINGKASAN ================= -->
        <section>
            <h2 class="text-2xl md:text-3xl font-bold text-center text-[#144F5F] mb-10">
                Ringkasan Jadwal Pelatihan Utama
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                <article class="p-6 bg-white shadow rounded-xl">
                    <h3 class="text-lg font-bold text-[#144F5F] mb-2">Pelatihan Januari</h3>
                    <p class="text-gray-600 text-sm">
                        Juru Las, K3 Umum, dan Keselamatan Kerja Dasar.
                    </p>
                </article>

                <article class="p-6 bg-white shadow rounded-xl">
                    <h3 class="text-lg font-bold text-[#144F5F] mb-2">Pelatihan Maret</h3>
                    <p class="text-gray-600 text-sm">
                        Operator Forklift, Crane, dan Pesawat Angkat Angkut.
                    </p>
                </article>

                <article class="p-6 bg-white shadow rounded-xl">
                    <h3 class="text-lg font-bold text-[#144F5F] mb-2">Pelatihan Juli</h3>
                    <p class="text-gray-600 text-sm">
                        K3 Migas, Scaffolding, dan Sertifikasi Lanjutan.
                    </p>
                </article>
            </div>
        </section>

        <!-- ================= PDF ================= -->
        <section class="mt-16">
            <h2 class="text-2xl md:text-3xl font-bold text-center text-[#144F5F] mb-6">
                Detail Lengkap Jadwal Pelatihan 2025
            </h2>

            <p class="text-center text-gray-600 mb-8 max-w-3xl mx-auto">
                Dokumen resmi berisi tanggal, lokasi, dan jenis sertifikasi pelatihan
                Intan Safety Jogja tahun 2025.
            </p>

            <div class="w-full h-[800px] border rounded shadow">
                <iframe src="{{ asset('files/jadwal-2025.pdf') }}" title="PDF Jadwal Pelatihan K3 Intan Safety 2025"
                    class="w-full h-full rounded" loading="lazy">
                </iframe>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ asset('files/jadwal-2025.pdf') }}" download rel="noopener noreferrer"
                    class="px-6 py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D]
                       text-white font-semibold rounded-lg shadow hover:opacity-90 transition">
                    Download Jadwal Pelatihan 2025 (PDF)
                </a>
            </div>
        </section>

        <!-- ================= CTA ================= -->
        <section class="mt-16 text-center">
            <h2 class="text-2xl font-bold text-[#144F5F] mb-4">
                Daftar Pelatihan K3 Sekarang
            </h2>
            <p class="text-gray-700 mb-6">
                Konsultasikan kebutuhan pelatihan K3 Anda bersama tim Intan Safety Jogja.
            </p>
            <a href="{{ url('/hubungi-kami') }}"
                class="px-6 py-3 bg-[#73BA7D] text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                Hubungi Tim Intan Safety
            </a>
        </section>

        <!-- ================= FAQ ================= -->
        <section class="mt-20">
            <h2 class="text-2xl md:text-3xl font-bold text-center text-[#144F5F] mb-8">
                FAQ Jadwal Pelatihan K3
            </h2>

            <div class="space-y-4 max-w-3xl mx-auto">
                <article class="p-4 bg-white rounded-lg shadow">
                    <h3 class="font-semibold text-[#144F5F]">
                        Bagaimana cara mendaftar pelatihan K3?
                    </h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Pendaftaran dapat dilakukan melalui halaman
                        <a href="{{ url('/hubungi-kami') }}" class="text-[#73BA7D] underline">
                            Hubungi Kami
                        </a>.
                    </p>
                </article>

                <article class="p-4 bg-white rounded-lg shadow">
                    <h3 class="font-semibold text-[#144F5F]">
                        Apakah tersedia pelatihan online?
                    </h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Ya, beberapa program tersedia dalam format online dan hybrid.
                    </p>
                </article>

                <article class="p-4 bg-white rounded-lg shadow">
                    <h3 class="font-semibold text-[#144F5F]">
                        Apakah peserta mendapatkan sertifikat resmi?
                    </h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Sertifikat resmi diterbitkan oleh Kemenaker RI atau BNSP sesuai program.
                    </p>
                </article>
            </div>
        </section>

    </main>
@endsection
