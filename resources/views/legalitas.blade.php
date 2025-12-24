@extends('layouts.app')

@section('title', 'Legalitas Perusahaan Intan Safety | Dokumen Resmi & Sertifikasi')

@section('meta_description',
    'Halaman legalitas resmi PT Intan Cahaya Mandiri (Intan Safety Jogja). Menampilkan
    dokumen perusahaan seperti NIB, SKDP, pengesahan Kemenkumham, dan legalitas pendukung lainnya.')

@section('canonical', url('/legalitas'))

@section('content')

    <!-- ================= HERO ================= -->
    <section class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Legalitas Perusahaan Intan Safety Jogja" width="1920"
            height="450" class="w-full h-56 md:h-64 object-cover">

        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/80 to-[#73BA7D]/80 flex items-center justify-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow text-center">
                Legalitas Perusahaan Intan Safety
            </h1>
        </div>
    </section>

    <main class="max-w-6xl mx-auto px-4 py-12">

        <!-- ================= INTRO ================= -->
        <section class="max-w-3xl mx-auto text-center mb-12">
            <p class="text-gray-700 leading-relaxed">
                <strong>PT Intan Cahaya Mandiri (Intan Safety Jogja)</strong>
                merupakan perusahaan jasa pembinaan, pelatihan, dan konsultasi
                <strong>Kesehatan dan Keselamatan Kerja (K3)</strong>
                yang beroperasi secara resmi dan terdaftar.
                Seluruh dokumen legalitas berikut ditampilkan sebagai bentuk
                transparansi serta komitmen perusahaan terhadap kepatuhan hukum.
            </p>
        </section>

        <!-- ================= DAFTAR LEGALITAS ================= -->
        <section>
            <h2 class="text-2xl md:text-3xl font-bold text-center text-[#144F5F] mb-12">
                Dokumen Resmi & Legalitas Perusahaan
            </h2>

            @php
                $legalitas = [
                    [
                        'title' => 'Nomor Induk Berusaha (NIB)',
                        'desc' =>
                            'Identitas resmi pelaku usaha PT Intan Cahaya Mandiri yang diterbitkan melalui sistem OSS.',
                        'image' => 'images/nib.jpeg',
                    ],
                    [
                        'title' => 'Surat Keterangan Domisili Perusahaan (SKDP)',
                        'desc' => 'Dokumen resmi yang menyatakan alamat domisili perusahaan di wilayah Yogyakarta.',
                        'image' => 'images/domisili.jpeg',
                    ],
                    [
                        'title' => 'Rekening Bank Perusahaan',
                        'desc' => 'Bukti kepemilikan rekening resmi perusahaan atas nama PT Intan Cahaya Mandiri.',
                        'image' => 'images/rekening.jpeg',
                    ],
                    [
                        'title' => 'Surat Keputusan Kepala Cabang',
                        'desc' => 'Surat penunjukan resmi Kepala Kantor Cabang Yogyakarta.',
                        'image' => 'images/sk-cabang.jpeg',
                    ],
                    [
                        'title' => 'Pengesahan Anggaran Dasar – Kemenkumham',
                        'desc' => 'Pengesahan perubahan anggaran dasar dari Kementerian Hukum dan HAM RI.',
                        'image' => 'images/kemenkumham.jpeg',
                    ],
                ];
            @endphp

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($legalitas as $doc)
                    <article class="bg-white shadow rounded-xl overflow-hidden hover:shadow-lg transition">
                        <img src="{{ asset($doc['image']) }}" alt="{{ $doc['title'] }} PT Intan Cahaya Mandiri"
                            width="600" height="400" class="h-48 w-full object-cover">

                        <div class="p-5">
                            <h3 class="font-bold text-lg text-[#144F5F] mb-2">
                                {{ $doc['title'] }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4">
                                {{ $doc['desc'] }}
                            </p>

                            <button type="button" data-image="{{ asset($doc['image']) }}"
                                class="lihat-gambar inline-flex items-center gap-2 px-4 py-2
                                   bg-[#73BA7D] text-white rounded shadow
                                   hover:bg-[#144F5F] transition">
                                Lihat Dokumen
                            </button>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <!-- ================= CTA ================= -->
        <section class="mt-20 text-center max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold text-[#144F5F] mb-4">
                Butuh Informasi Legalitas Lebih Lengkap?
            </h2>
            <p class="text-gray-700 mb-6">
                Tim Intan Safety Jogja siap membantu Anda terkait legalitas perusahaan,
                kerja sama, maupun kebutuhan pelatihan K3.
            </p>
            <a href="{{ url('/hubungi-kami') }}"
                class="px-6 py-3 bg-[#73BA7D] text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                Hubungi Kami
            </a>
        </section>

    </main>

    <!-- ================= MODAL ================= -->
    <div id="docModal" class="hidden fixed inset-0 bg-black/80 flex items-center justify-center z-50">
        <button id="closeDocModal" class="absolute top-6 right-6 text-white text-3xl">&times;</button>
        <img id="docModalImg" src="" alt="Preview Dokumen Legalitas Intan Safety" width="900" height="1200"
            class="max-h-[80vh] max-w-[90vw] rounded-lg shadow-lg">
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('docModal');
            const modalImg = document.getElementById('docModalImg');
            const closeBtn = document.getElementById('closeDocModal');

            document.querySelectorAll('.lihat-gambar').forEach(button => {
                button.addEventListener('click', function() {
                    const imageSrc = this.dataset.image;
                    modalImg.src = imageSrc;
                    modal.classList.remove('hidden');
                });
            });

            closeBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
                modalImg.src = '';
            });

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    modalImg.src = '';
                }
            });
        });
    </script>

@endsection
