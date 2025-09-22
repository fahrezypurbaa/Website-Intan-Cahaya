@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-4">
    <h2 class="text-3xl font-bold mb-6 text-center">Jadwal Pelatihan 2025</h2>

    {{-- PDF Viewer --}}
    <div class="w-full h-[900px] border rounded shadow">
        <iframe src="{{ asset('files/jadwal-2025.pdf') }}" 
                class="w-full h-full rounded"
                frameborder="0"></iframe>
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
