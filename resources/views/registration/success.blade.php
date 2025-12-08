@extends('layouts.app')

@section('content')
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Registration-success"
            class="w-full h-64 object-cover rounded-lg shadow-md">
        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/70 to-[#73BA7D]/70 flex items-center justify-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow">
                PENDAFTARAN PELATIHAN BERHASIL
            </h1>
        </div>
    </div>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-6 py-12">
        <div class="bg-white shadow-lg rounded-2xl p-10 max-w-xl w-full text-center border border-gray-100">
            <!-- Icon sukses -->
            <div class="flex justify-center mb-6">
                <div class="bg-gradient-to-r from-[#144F5F] to-[#73BA7D] p-4 rounded-full shadow-md">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2l4-4m6 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <!-- Judul -->
            <h2 class="text-3xl font-bold text-[#144F5F] mb-2">Pendaftaran Berhasil</h2>
            <div class="w-20 h-1 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] mx-auto rounded mb-6"></div>

            <p class="text-gray-700 mb-2 text-lg">Terima kasih sudah mendaftar di <span
                    class="font-semibold text-green-700">Intan Safety Jogja</span>.</p>
            <p class="text-gray-500 mb-8">Silakan hubungi admin via WhatsApp untuk melanjutkan proses berkas & pembayaran.
            </p>

            <!-- Tombol -->
            <a href="https://wa.me/6282146134846" target="_blank"
                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] hover:opacity-90 text-white font-semibold rounded-lg shadow-md transition duration-200">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12.04 2C6.5 2 2 6.48 2 12c0 2.12.58 4.11 1.68 5.86L2 22l4.27-1.63A9.94 9.94 0 0 0 12.04 22c5.52 0 10-4.48 10-10s-4.48-10-10-10Zm0 18c-1.63 0-3.22-.42-4.63-1.23l-.33-.19l-2.53.97l.95-2.48l-.2-.34A8.02 8.02 0 1 1 20.04 12c0 4.41-3.59 8-8 8Zm4.42-5.42c-.24-.12-1.42-.7-1.64-.78c-.22-.08-.38-.12-.54.12s-.62.78-.76.94c-.14.16-.28.18-.52.06c-.24-.12-1.01-.37-1.92-1.17c-.71-.63-1.19-1.42-1.33-1.66c-.14-.24-.01-.38.11-.5c.11-.11.24-.28.36-.42c.12-.14.16-.24.24-.4c.08-.16.04-.3-.02-.42c-.06-.12-.54-1.3-.74-1.78c-.2-.48-.4-.42-.54-.42c-.14 0-.3-.02-.46-.02c-.16 0-.42.06-.64.3c-.22.24-.84.82-.84 2c0 1.18.86 2.32.98 2.48c.12.16 1.7 2.6 4.13 3.64c.58.25 1.03.4 1.38.52c.58.18 1.1.16 1.52.1c.46-.07 1.42-.58 1.62-1.14c.2-.56.2-1.04.14-1.14c-.06-.1-.22-.16-.46-.28Z" />
                </svg>
                Chat Admin di WhatsApp
            </a>
        </div>
    </div>
@endsection
