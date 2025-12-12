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
        <div class="w-full mt-6 mb-10">

            {{-- Mobile: Scroll Horizontal --}}
            <div class="md:hidden px-4 overflow-x-auto no-scrollbar flex gap-3 pb-2">
                {{-- Semua --}}
                <a href="{{ route('galeri.category', ['slug' => 'all']) }}"
                    class="whitespace-nowrap px-4 py-2 rounded-full text-sm border shadow-sm transition
            {{ $activeCategory == 'all'
                ? 'bg-[#73BA7D] text-white border-[#73BA7D]'
                : 'bg-white text-gray-700 border-gray-300' }}">
                    Semua
                </a>

                @foreach ($categories as $category)
                    <a href="{{ route('galeri.category', $category->slug) }}"
                        class="whitespace-nowrap px-4 py-2 rounded-full text-sm border shadow-sm transition
                {{ $activeCategory == $category->slug
                    ? 'bg-[#73BA7D] text-white border-[#73BA7D]'
                    : 'bg-white text-gray-700 border-gray-300' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            {{-- Desktop: Grid --}}
            <div class="hidden md:grid 
            grid-cols-4 xl:grid-cols-5 
            gap-4 max-w-5xl mx-auto px-4">

                <a href="{{ route('galeri.category', ['slug' => 'all']) }}"
                    class="text-center px-4 py-3 rounded-lg font-medium text-sm border shadow-sm transition
        {{ $activeCategory == 'all'
            ? 'bg-[#73BA7D] text-white border-[#73BA7D]'
            : 'bg-white text-gray-700 border-gray-300 hover:bg-[#73BA7D] hover:text-white hover:border-[#73BA7D]' }}">
                    Semua
                </a>

                @foreach ($categories as $category)
                    <a href="{{ route('galeri.category', $category->slug) }}"
                        class="text-center px-4 py-3 rounded-lg font-medium text-sm border shadow-sm transition
            {{ $activeCategory == $category->slug
                ? 'bg-[#73BA7D] text-white border-[#73BA7D]'
                : 'bg-white text-gray-700 border-gray-300 hover:bg-[#73BA7D] hover:text-white hover:border-[#73BA7D]' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
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
