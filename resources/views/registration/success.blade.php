@extends('layouts.app')

@section('title', 'Pendaftaran Pelatihan Berhasil | Intan Safety')

@section('meta')
    <meta name="description"
        content="Pendaftaran pelatihan K3 Anda di Intan Safety berhasil. Silakan hubungi admin untuk melanjutkan proses administrasi dan pembayaran.">
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')

    {{-- Banner --}}
    <section class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="Pendaftaran Pelatihan Berhasil Intan Safety"
            class="w-full h-64 object-cover rounded-lg shadow-md" width="1920" height="400">

        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/70 to-[#73BA7D]/70 flex items-center justify-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow">
                Pendaftaran Pelatihan Berhasil
            </h1>
        </div>
    </section>

    <section class="min-h-screen flex items-center justify-center bg-gray-50 px-6 py-12">

        <article class="bg-white shadow-lg rounded-2xl p-10 max-w-xl w-full text-center border border-gray-100">

            {{-- Icon --}}
            <div class="flex justify-center mb-6">
                <div class="bg-gradient-to-r from-[#144F5F] to-[#73BA7D] p-4 rounded-full shadow-md">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2l4-4m6 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            {{-- Heading --}}
            <h2 class="text-3xl font-bold text-[#144F5F] mb-3">
                Registrasi Anda Telah Berhasil
            </h2>

            <div class="w-20 h-1 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] mx-auto rounded mb-6"></div>

            {{-- Content --}}
            <p class="text-gray-700 mb-3 text-lg">
                Terima kasih telah melakukan pendaftaran pelatihan di
                <span class="font-semibold text-green-700">Intan Safety</span>.
            </p>

            <p class="text-gray-500 mb-8">
                Untuk melanjutkan proses administrasi, berkas, dan pembayaran,
                silakan hubungi admin melalui WhatsApp.
            </p>

            {{-- CTA --}}
            <a href="https://wa.me/6282146134846" target="_blank" rel="noopener noreferrer"
                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#144F5F] to-[#73BA7D] hover:opacity-90 text-white font-semibold rounded-lg shadow-md transition"
                aria-label="Hubungi admin Intan Safety melalui WhatsApp">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12.04 2C6.5 2 2 6.48 2 12c0 2.12.58 4.11 1.68 5.86L2 22l4.27-1.63A9.94 9.94 0 0 0 12.04 22c5.52 0 10-4.48 10-10s-4.48-10-10-10Zm0 18c-1.63 0-3.22-.42-4.63-1.23l-.33-.19l-2.53.97l.95-2.48l-.2-.34A8.02 8.02 0 1 1 20.04 12c0 4.41-3.59 8-8 8Z" />
                </svg>
                Chat Admin di WhatsApp
            </a>

        </article>

    </section>

@endsection
