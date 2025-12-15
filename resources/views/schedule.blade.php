@extends('layouts.app')

@section('title', 'Jadwal Pelatihan K3 2025 Intan Safety Jogja | Sertifikasi Kemenaker & BNSP')

@section('meta_description',
    'Lihat jadwal lengkap pelatihan K3 Intan Safety Jogja tahun 2025. Tersedia pelatihan
    Kemenaker RI, BNSP, dan non-sertifikasi dengan instruktur berpengalaman.')

@section('canonical', url('/jadwal-pelatihan'))

@section('content')

    <!-- ================= HERO / BANNER ================= -->
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

        <!-- ================= INTRO KONTEN ================= -->
        <section class="mb-12 text-center max-w-3xl mx-auto">
            <p class="text-gray-700 leading-relaxed">
                <strong>Intan Safety Jogja</strong> menyediakan berbagai program
                <strong>pelatihan dan sertifikasi K3</strong> sepanjang tahun 2025,
                baik <strong>Kemenaker RI</strong>, <strong>BNSP</strong>,
                maupun <strong>non-sertifikasi</strong>.
                Jadwal disusun fleksibel untuk memenuhi kebutuhan individu maupun perusahaan.
            </p>
        </section>

        <!-- ================= RINGKASAN JADWAL ================= -->
        <section>
            <h2 class="text-2xl md:text-3xl font-bold text-center text-[#144F5F] mb-10">
                Ringkasan Jadwal Pelatihan Utama
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                <article class="p-6 bg-white shadow rounded-xl hover:shadow-md transition">
                    <h3 class="text-xl font-bold text-[#144F5F] mb-2">Pelatihan Januari</h3>
                    <p class="text-gray-600 text-sm">
                        Juru Las • K3 Umum • Keselamatan Kerja Dasar
                    </p>
                </article>

                <article class="p-6 bg-white shadow rounded-xl hover:shadow-md transition">
                    <h3 class="text-xl font-bold text-[#144F5F] mb-2">Pelatihan Maret</h3>
                    <p class="text-gray-600 text-sm">
                        Operator Forklift • Operator Crane • Pesawat Angkat Angkut
                    </p>
                </article>

                <article class="p-6 bg-white shadow rounded-xl hover:shadow-md transition">
                    <h3 class="text-xl font-bold text-[#144F5F] mb-2">Pelatihan Juli</h3>
                    <p class="text-gray-600 text-sm">
                        K3 Migas • Scaffolding • Sertifikasi Lanjutan
                    </p>
                </article>
            </div>
        </section>

        <!-- ================= DETAIL JADWAL PDF ================= -->
        <section class="mt-16">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center text-[#144F5F]">
                Detail Lengkap Jadwal Pelatihan 2025
            </h2>

            <p class="text-center text-gray-600 mb-8 max-w-3xl mx-auto">
                Unduh atau lihat dokumen resmi jadwal pelatihan Intan Safety Jogja tahun 2025
                untuk informasi tanggal, lokasi, dan jenis sertifikasi yang tersedia.
            </p>

            <div class="w-full h-[800px] md:h-[900px] border rounded shadow">
                <iframe src="{{ asset('files/jadwal-2025.pdf') }}" title="PDF Jadwal Pelatihan K3 Intan Safety 2025"
                    class="w-full h-full rounded" loading="lazy">
                </iframe>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ asset('files/jadwal-2025.pdf') }}" download
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
                Konsultasikan kebutuhan pelatihan Anda bersama tim Intan Safety Jogja.
            </p>
            <a href="{{ url('/hubungi-kami') }}"
                class="px-6 py-3 bg-[#73BA7D] text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                Hubungi Tim Intan Safety
            </a>
        </section>

        <!-- ================= FAQ ================= -->
        <section class="mt-20">
            <h2 class="text-2xl md:text-3xl font-bold text-[#144F5F] mb-8 text-center">
                FAQ Jadwal Pelatihan K3
            </h2>

            <div class="space-y-4 max-w-3xl mx-auto">
                <article class="p-4 bg-white rounded-lg shadow">
                    <h3 class="font-semibold text-[#144F5F]">
                        Bagaimana cara mendaftar pelatihan?
                    </h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Anda dapat mendaftar melalui halaman
                        <a href="{{ url('/hubungi-kami') }}" class="text-[#73BA7D] underline">
                            Hubungi Kami
                        </a>
                        atau langsung menghubungi admin Intan Safety.
                    </p>
                </article>

                <article class="p-4 bg-white rounded-lg shadow">
                    <h3 class="font-semibold text-[#144F5F]">
                        Apakah tersedia pelatihan online?
                    </h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Ya, beberapa program tersedia dalam format pelatihan online dan hybrid.
                    </p>
                </article>

                <article class="p-4 bg-white rounded-lg shadow">
                    <h3 class="font-semibold text-[#144F5F]">
                        Apakah peserta mendapatkan sertifikat resmi?
                    </h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Peserta akan memperoleh sertifikat resmi dari
                        Kemenaker RI atau BNSP sesuai jenis pelatihan.
                    </p>
                </article>
            </div>
        </section>

    </main>
@endsection
