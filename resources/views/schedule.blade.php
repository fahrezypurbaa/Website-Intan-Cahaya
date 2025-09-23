@extends('layouts.app')

@section('title', 'Jadwal Pelatihan 2025 - Intan Safety')

@section('content')

    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Jadwal Kami"
            class="w-full h-64 object-cover rounded-lg shadow-md">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-end pr-8">
            <h1 class="text-3xl md:text-4xl font-bold text-white">
                JADWAL 2025
            </h1>
        </div>
    </div>
    {{-- judul PDF --}}
    <div class="max-w-6xl mx-auto py-12 px-4">
        <h2 class="text-3xl font-bold mb-6 text-center">Jadwal Pelatihan 2025</h2>

        {{-- PDF Viewer --}}
        <div class="w-full h-[900px] border rounded shadow">
            <iframe src="{{ asset('files/jadwal-2025.pdf') }}" class="w-full h-full rounded" frameborder="0"></iframe>
        </div>

        {{-- Tombol download --}}
        <div class="mt-6 text-center">
            <a href="{{ asset('files/jadwal-2025.pdf') }}" download
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                📥 Download Jadwal PDF
            </a>
        </div>
    </div>
@endsection
