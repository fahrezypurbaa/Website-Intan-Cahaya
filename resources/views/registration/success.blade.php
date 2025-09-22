@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-12 text-center">
    <h2 class="text-2xl font-bold mb-4 text-green-600">Pendaftaran Berhasil 🎉</h2>
    <p class="mb-6">Terima kasih sudah mendaftar.</p>
    <p class="mb-6 text-gray-600">Silakan hubungi admin via WhatsApp untuk mengurus berkas & pembayaran.</p>
    
    <a href="https://wa.me/{{ $adminWa }}"
       target="_blank"
       class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
       Chat Admin di WhatsApp
    </a>
</div>
@endsection
