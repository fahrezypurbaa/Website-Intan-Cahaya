@extends('layouts.app')

@section('title', 'Galeri - Intan Safety')

@section('content')
    <!-- Hero Section -->
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Kontak Kami"
            class="w-full h-64 object-cover rounded-lg shadow-md">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <h1 class="text-4xl text-green-100 font-bold">Galeri Intan Safety</h1>
        </div>
    </div>
    <!-- Dokumentasi -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-10">Dokumentasi Pelaksanaan</h2>

            <!-- Grid Galeri -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($galleries as $gallery)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                            class="w-full h-56 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $gallery->title ?? 'Tanpa Judul' }}</h3>
                            <p class="text-sm text-gray-500">{{ $gallery->category ?? '-' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
