@extends('layouts.app')

@section('title', 'Galeri Kegiatan Intan Safety Jogja | Dokumentasi Pelatihan & Sertifikasi K3')

@section('meta_description',
    'Galeri dokumentasi kegiatan Intan Safety Jogja meliputi pelatihan dan sertifikasi K3
    Kemenaker RI, BNSP, serta pelatihan non-sertifikasi. Lihat aktivitas, suasana kelas, dan kegiatan lapangan kami.')

@section('canonical', url('/galeri'))

@section('content')

    {{-- ================= HERO / BANNER ================= --}}
    <section class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Galeri Kegiatan Intan Safety Jogja"
            class="w-full h-64 object-cover shadow-md">

        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/70 to-[#73BA7D]/70 flex items-center justify-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow text-center">
                Galeri Intan Safety
            </h1>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-4 py-12">

        {{-- ================= INTRO KONTEN ================= --}}
        <section class="max-w-3xl mx-auto text-center mb-12">
            <p class="text-gray-700 leading-relaxed">
                Berikut adalah dokumentasi kegiatan
                <strong>pelatihan dan sertifikasi K3</strong> yang diselenggarakan oleh
                <strong>Intan Safety Jogja</strong>.
                Galeri ini mencakup program
                <strong>Kemenaker RI</strong>, <strong>BNSP</strong>,
                serta pelatihan <strong>non-sertifikasi</strong>
                yang dilaksanakan secara offline, online, maupun in-house training.
            </p>
        </section>

        {{-- ================= FILTER KATEGORI (FINAL) ================= --}}
        <section class="mb-14">
            <div class="flex gap-3 overflow-x-auto no-scrollbar pb-2">

                {{-- Semua --}}
                <a href="{{ route('galeri.category', 'all') }}"
                    class="px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap border transition
            {{ $activeCategory == 'all'
                ? 'bg-[#144F5F] text-white border-[#144F5F]'
                : 'bg-white text-gray-600 border-gray-300 hover:bg-gray-100' }}">
                    Semua
                </a>

                {{-- Kategori --}}
                @foreach ($categories as $category)
                    <a href="{{ route('galeri.category', $category->slug) }}"
                        class="px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap border transition
                {{ $activeCategory == $category->slug
                    ? 'bg-[#144F5F] text-white border-[#144F5F]'
                    : 'bg-white text-gray-600 border-gray-300 hover:bg-gray-100' }}">
                        {{ $category->name }}
                    </a>
                @endforeach

            </div>
        </section>

        {{-- ================= GRID GALERI ================= --}}
        <section>
            <h2 class="sr-only">Dokumentasi Kegiatan Intan Safety</h2>

            <div id="galleryGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                @forelse ($galleries as $gallery)
                    <article
                        class="gallery-item group relative cursor-pointer rounded-lg overflow-hidden shadow hover:shadow-lg transition">

                        <img src="{{ asset('storage/' . $gallery->image) }}"
                            alt="{{ $gallery->title ?? 'Dokumentasi Kegiatan Intan Safety' }}"
                            class="w-full h-48 object-contain bg-gray-100 transform group-hover:scale-105 transition duration-300"
                            data-full="{{ asset('storage/' . $gallery->image) }}">

                        <div
                            class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                            <p class="text-white font-semibold text-center px-2 text-sm">
                                {{ $gallery->title ?? ($gallery->category->name ?? 'Kegiatan Intan Safety') }}
                            </p>
                        </div>
                    </article>
                @empty
                    <p class="col-span-full text-center text-gray-600">
                        Tidak ada dokumentasi untuk kategori ini.
                    </p>
                @endforelse
            </div>
        </section>

        {{-- ================= MODAL PREVIEW ================= --}}
        <div id="imageModal" class="fixed inset-0 bg-black/70 hidden flex items-center justify-center z-50">
            <button id="closeModal" class="absolute top-5 right-5 text-white text-4xl">&times;</button>
            <img id="modalImage" class="max-w-[90%] max-h-[90%] object-contain"
                alt="Preview Dokumentasi Kegiatan Intan Safety">
        </div>

    </main>
@endsection
