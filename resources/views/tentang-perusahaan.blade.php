@extends('layouts.app')

@section('title', 'Tentang Perusahaan - Intan Safety')

@section('content')
    <!-- Hero / Banner -->
    <section class="relative bg-white">
        <div class="max-w-7xl mx-auto px-4 py-12 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-gray-800">Tentang Perusahaan</h1>

            <!-- Garis Hijau -->
            <div class="w-24 h-1 bg-[#73BA7D] mx-auto mt-4 mb-2"></div>

            <p class="mt-2 text-gray-600">#Safety, Quality & Competent</p>
        </div>
    </section>
    <!-- Foto Tim + Deskripsi -->
    <section class="max-w-7xl mx-auto px-2 py-2">
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/tim-kami.JPG') }}" alt="Tim Perusahaan" class="rounded-lg shadow-lg">
            <p class="mt-6 text-center text-gray-700 max-w-3xl">
                PT Intan Cahaya Mandiri telah resmi ditunjuk oleh Kementerian Tenaga Kerja Republik Indonesia
                sebagai Perusahaan Jasa Pembinaan Kesehatan dan Keselamatan Kerja (PJK3) melalui surat keputusan
                Direktorat Jenderal Pembinaan Pengawasan Ketenagakerjaan terbaru
                <strong>Nomor 5/348/AS.02.00/III/2021</strong>.
            </p>
        </div>
    </section>

    <!-- Visi & Misi -->
    <section class="bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2">
            <!-- Visi -->
            <div class="pr-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Visi</h2>
                <p class="text-gray-700 leading-relaxed">
                    Menjadi perusahaan jasa pembinaan, pelatihan dan konsultan keselamatan dan kesehatan kerja,
                    yang jujur dan terpercaya sehingga mampu merubah keadaan yang lebih baik pada pelanggan
                    dan partner.
                </p>
            </div>

            <!-- Misi (ada garis hijau di kiri) -->
            <div class="pl-6 border-l-4 border-[#73BA7D]">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Misi</h2>
                <ul class="list-decimal list-inside text-gray-700 space-y-2">
                    <li>Menjadi mitra terpercaya bagi semua perusahaan dan yang peduli akan manfaat K3.</li>
                    <li>Mendorong berperilaku aman dan sehat di lingkungan kerja.</li>
                    <li>Memberikan pelayanan berkualitas dengan komitmen profesional.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Sejarah Perusahaan -->
    <section class="max-w-6xl mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Sejarah Perusahaan</h2>
        <div class="space-y-8">
            <div class="flex gap-6">
                <span class="text-2xl font-bold text-[#73BA7D] w-20">2021</span>
                <p class="text-gray-700">
                    Intan Cahaya Mandiri cabang Yogyakarta berdiri di tanggal 20 Agustus 2021,
                    berfokus pada pelatihan juru las dan pesawat angkat angkut Kemenaker RI.
                </p>
            </div>
            <div class="flex gap-6">
                <span class="text-2xl font-bold text-[#73BA7D] w-20">2022</span>
                <p class="text-gray-700">
                    Intan Safety Jogja mulai mencari formulasi baru untuk sertifikasi BNSP dan Non Sertifikasi,
                    termasuk Online Training.
                </p>
            </div>
            <div class="flex gap-6">
                <span class="text-2xl font-bold text-[#73BA7D] w-20">2023</span>
                <p class="text-gray-700">
                    Tetap optimis dengan bertambahnya jumlah event pelatihan dan client,
                    membuat perusahaan semakin berkembang.
                </p>
            </div>
            <div class="flex gap-6">
                <span class="text-2xl font-bold text-[#73BA7D] w-20">2024</span>
                <p class="text-gray-700">
                    Melakukan inovasi dalam kegiatan pelatihan dengan judul lebih variatif,
                    mencapai lebih dari 800 alumni.
                </p>
            </div>
            <div class="flex gap-6">
                <span class="text-2xl font-bold text-[#73BA7D] w-20">2025</span>
                <p class="text-gray-700">
                    Terus meningkatkan kualitas layanan agar menjadi penyedia pelatihan yang terpercaya, unggul, dan
                    berkualitas.
                </p>
            </div>
        </div>
    </section>
@endsection
