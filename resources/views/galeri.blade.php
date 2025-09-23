@extends('layouts.app')

@section('title', 'Gallery - Intan Safety')

@section('content')

{{-- Banner Kontak Kami --}}
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Gallery Kami"
            class="w-full h-64 object-cover rounded-lg shadow-md">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-end pr-8">
            <h1 class="text-3xl md:text-4xl font-bold text-white">
                GALLERY INTAN SAFETY
            </h1>
        </div>
    </div>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">DOKUMENTASI KEGIATAN</h1>

    <!-- Filter kategori (scrollable di mobile) -->
    <div id="galleryFilters" class="flex space-x-4 overflow-x-auto pb-2 mb-6 no-scrollbar">
        <button data-category="all"
            class="px-4 py-2 rounded-full bg-gray-200 hover:bg-[#73BA7D] hover:text-white whitespace-nowrap">
            Semua
        </button>
        @foreach($categories as $category)
            <button data-category="{{ $category }}"
                class="px-4 py-2 rounded-full bg-gray-200 hover:bg-[#73BA7D] hover:text-white whitespace-nowrap">
                {{ ucfirst($category) }}
            </button>
        @endforeach
    </div>

    <!-- Grid galeri -->
    <div id="galleryGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        @foreach($galleries as $gallery)
            <div class="gallery-item" data-category="{{ $gallery->category }}">
                <img src="{{ asset('storage/' . $gallery->image) }}" 
                     alt="{{ $gallery->title ?? 'Gallery' }}" 
                     class="gallery-img">
                <p class="gallery-caption">
                    {{ $gallery->title ?? ucfirst($gallery->category) }}
                </p>
            </div>
        @endforeach
    </div>
</div>

@endsection
