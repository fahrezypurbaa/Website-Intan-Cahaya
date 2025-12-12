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
            Dokumentasi Kegiatan
        </h2>

        {{-- Filter kategori --}}
        <div id="galleryFilters" class="flex space-x-3 overflow-x-auto pb-2 mb-10 no-scrollbar justify-center">

            {{-- Tombol "Semua" --}}
            <a href="{{ route('galeri', ['category' => 'all']) }}"
                class="px-5 py-2 rounded-full 
                {{ request('category') == 'all' || request('category') == null ? 'bg-[#73BA7D] text-white' : 'bg-gray-200 text-gray-700' }}
                font-medium shadow hover:opacity-90 transition">
                Semua
            </a>

            {{-- Loop kategori --}}
            @foreach ($categories as $category)
                <a href="{{ route('galeri', ['category' => $category]) }}"
                    class="px-5 py-2 rounded-full 
                    {{ request('category') == $category ? 'bg-[#73BA7D] text-white' : 'bg-gray-200 text-gray-700' }}
                    font-medium hover:bg-[#73BA7D] hover:text-white transition whitespace-nowrap">
                    {{ ucfirst($category) }}
                </a>
            @endforeach
        </div>

        {{-- Grid galeri --}}
        <div id="galleryGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            @forelse ($galleries as $gallery)
                <div
                    class="gallery-item group relative cursor-pointer rounded-lg overflow-hidden shadow hover:shadow-lg transition">

                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Gallery' }}"
                        class="w-full h-48 object-contain bg-gray-100 cursor-pointer transform group-hover:scale-105 transition duration-300"
                        data-full="{{ asset('storage/' . $gallery->image) }}">

                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        <p class="text-white font-semibold text-center px-2">
                            {{ $gallery->title ?? ucfirst($gallery->category) }}
                        </p>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-600">
                    Tidak ada foto untuk kategori ini.
                </p>
            @endforelse
        </div>

        {{-- Modal Preview --}}
        <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-70 hidden flex items-center justify-center z-50">
            <span id="closeModal" class="absolute top-5 right-5 text-white text-4xl cursor-pointer">&times;</span>
            <img id="modalImage" class="max-w-[90%] max-h-[90%] object-contain" />
        </div>
    </div>
@endsection
