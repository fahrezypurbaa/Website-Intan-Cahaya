@extends('layouts.app')

@section('title', 'Layanan Pelatihan & Sertifikasi - Intan Safety')

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-4 grid grid-cols-1 lg:grid-cols-[16rem_1fr] gap-8">

        {{-- Sidebar Kategori --}}
        <aside class="order-1 lg:order-none lg:sticky lg:top-24 self-start max-h-[80vh] overflow-y-auto">
            <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
                <h3 class="font-bold text-lg mb-4 text-[#144F5F] sticky top-0 bg-white py-2">Kategori</h3>
                <ul class="space-y-2">
                    @foreach ($categories as $cat)
                        <li>
                            <a href="{{ route('layanan.index', ['category' => $cat->slug]) }}"
                                class="block px-3 py-2 rounded-lg transition font-medium
                            {{ request('category') == $cat->slug
                                ? 'bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white shadow'
                                : 'hover:bg-[#73BA7D]/20 text-[#144F5F]' }}">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <a href="{{ route('registration.form') }}"
                    class="mt-6 block w-full text-center px-4 py-2 bg-gradient-to-r from-[#144F5F] to-[#73BA7D]
                text-white rounded-lg font-bold shadow-md hover:opacity-90 transition sticky bottom-0">
                    📋 Formulir Registrasi
                </a>
            </div>
        </aside>

        {{-- Main Content --}}
        <main>
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-[#144F5F]">Daftar Layanan Pelatihan</h1>
            </div>

            @if ($trainings->count())
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($trainings as $t)
                        <div
                            class="bg-white rounded-xl shadow-md hover:shadow-xl overflow-hidden transition transform hover:-translate-y-1 border border-gray-100 flex flex-col">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $t->image) }}" class="h-40 w-full object-cover"
                                    alt="{{ $t->title }}">
                            </div>

                            <div class="p-5 flex-1 flex flex-col">
                                <div class="flex flex-wrap gap-2 mb-2">
                                    @if ($t->mode)
                                        <span
                                            class="px-2 py-1 text-xs bg-gradient-to-r from-[#144F5F]/20 to-[#73BA7D]/20 text-[#144F5F] rounded">
                                            {{ $t->mode }}
                                        </span>
                                    @endif
                                    <span class="px-2 py-1 text-xs bg-[#144F5F]/10 text-[#144F5F] rounded">
                                        {{ $t->category->name }}
                                    </span>
                                </div>

                                <h3 class="text-lg font-bold mb-1 text-[#144F5F]">{{ $t->title }}</h3>
                                <div class="flex items-center gap-2 mb-2">
                                    <x-heroicon-o-calendar class="w-5 h-5 text-[#144F5F] flex-shrink-0" />
                                    <p class="text-gray-600 text-sm">{{ $t->duration }}</p>
                                </div>

                                <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                                    {{ $t->description }}
                                </p>

                                <a href="{{ route('layanan.show', $t->slug) }}"
                                    class="mt-auto block w-full text-center py-2 rounded font-semibold text-white
                                bg-gradient-to-r from-[#144F5F] to-[#73BA7D] hover:opacity-90 transition">
                                    Lihat Detail Kelas
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination: tetap membawa kategori --}}
            @elseif ($trainings->count() > 0)
                <div class="mt-8 flex justify-center">
                    <div class="w-full max-w-md">
                        {{ $trainings->appends(request()->only('category'))->links() }}
                    </div>
                </div>
            @else
                <div class="flex flex-col items-center text-center py-16">
                    <img src="{{ asset('images/update-website.jpg') }}" alt="Layanan Update" class="w-64 mb-6 opacity-90">

                    <h2 class="text-xl font-semibold text-gray-800">
                        Layanan sedang kami update, mohon ditunggu ya
                    </h2>
                    <p class="text-gray-600 mt-2 max-w-sm">
                        Tim kami sedang menyiapkan layanan terbaru untuk Anda.
                    </p>
                </div>
            @endif

        </main>
    </div>
@endsection
