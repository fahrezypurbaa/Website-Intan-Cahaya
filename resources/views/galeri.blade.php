@extends('layouts.app')

@section('title', 'Gallery - Intan Safety')

@section('content')

    {{-- Banner --}}
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Gallery Kami"
            class="w-full h-64 object-cover rounded-lg shadow-md">
        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/70 to-[#73BA7D]/70 flex items-center justify-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow">
                GALLERY INTAN SAFETY
            </h1>
        </div>
    </div>

    <div class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold mb-8 text-center text-[#144F5F]">
            <i class="fa-solid fa-camera mr-2 text-[#73BA7D]"></i> Dokumentasi Kegiatan
        </h2>


        {{-- Filter kategori --}}
        <div id="galleryFilters" class="flex space-x-3 overflow-x-auto pb-2 mb-10 no-scrollbar justify-center">
            <button data-category="all"
                class="px-5 py-2 rounded-full bg-[#73BA7D] text-white font-medium shadow hover:opacity-90 transition">
                Semua
            </button>
            @foreach ($categories as $category)
                <button data-category="{{ $category }}"
                    class="px-5 py-2 rounded-full bg-gray-200 text-gray-700 font-medium hover:bg-[#73BA7D] hover:text-white transition whitespace-nowrap">
                    {{ ucfirst($category) }}
                </button>
            @endforeach
        </div>

        {{-- Grid galeri --}}
        <div id="galleryGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            @foreach ($galleries as $gallery)
                <div class="gallery-item group relative cursor-pointer rounded-lg overflow-hidden shadow hover:shadow-lg transition"
                    data-category="{{ $gallery->category }}">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Gallery' }}"
                        class="w-full h-48 object-cover transform group-hover:scale-110 transition duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        <p class="text-white font-semibold text-center px-2">
                            {{ $gallery->title ?? ucfirst($gallery->category) }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Modal preview foto --}}
    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50">
        <button id="closeModal" class="absolute top-5 right-5 text-white text-3xl">&times;</button>
        <img id="modalImage" src="" class="max-h-[80vh] max-w-[90vw] rounded-lg shadow-lg">
    </div>

@endsection
