@extends('layouts.app')

@section('title', 'Layanan Pelatihan & Sertifikasi - Intan Safety')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4 grid grid-cols-1 lg:grid-cols-[16rem_1fr] gap-8">

    {{-- Sidebar Kategori --}}
    <aside class="order-1 lg:order-none lg:sticky lg:top-24 self-start max-h-[80vh] overflow-y-auto">
        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
            <h3 class="font-bold text-lg mb-4 text-[#144F5F] sticky top-0 bg-white py-2">
                Kategori
            </h3>

            <ul class="space-y-2">
                @foreach ($categories as $cat)
                    <li>
                        <a href="{{ url('/layanan/' . $cat->slug) }}"
                            class="block px-3 py-2 rounded-lg transition font-medium
                            {{ ($categorySlug ?? null) == $cat->slug
                                ? 'bg-gradient-to-r from-[#144F5F] to-[#73BA7D] text-white shadow'
                                : 'hover:bg-[#73BA7D]/20 text-[#144F5F]' }}">
                            {{ $cat->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('registration.form') }}"
               class="mt-6 block w-full text-center px-4 py-2
               bg-gradient-to-r from-[#144F5F] to-[#73BA7D]
               text-white rounded-lg font-bold shadow-md hover:opacity-90 transition">
                Formulir Registrasi
            </a>
        </div>
    </aside>

    {{-- Main Content --}}
    <main>
        <h1 class="text-3xl font-extrabold text-[#144F5F] mb-6 pb-1 border-b-4
                   border-[#73BA7D] inline-block">
            @if (!empty($categorySlug))
                {{ ucwords(str_replace('-', ' ', $categorySlug)) }}
            @else
                Layanan Pelatihan & Sertifikasi Intan Safety
            @endif
        </h1>

        @if ($trainings->count())
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($trainings as $t)
                    <div
                        class="bg-white rounded-xl shadow-md hover:shadow-xl
                               overflow-hidden transition transform hover:-translate-y-1
                               border border-gray-100 flex flex-col">

                        {{-- IMAGE (ABSOLUT - AMAN PAGINATION) --}}
                        <img
                            src="{{ asset('storage/' . $t->image) }}"
                            alt="{{ $t->title }}"
                            class="h-40 w-full object-cover"
                            loading="lazy"
                        >

                        <div class="p-5 flex-1 flex flex-col">
                            <div class="flex flex-wrap gap-2 mb-2">
                                @if ($t->mode)
                                    <span class="px-2 py-1 text-xs
                                        bg-gradient-to-r from-[#144F5F]/20 to-[#73BA7D]/20
                                        text-[#144F5F] rounded">
                                        {{ $t->mode }}
                                    </span>
                                @endif

                                <span class="px-2 py-1 text-xs bg-[#144F5F]/10
                                    text-[#144F5F] rounded">
                                    {{ $t->category->name }}
                                </span>
                            </div>

                            <h3 class="text-lg font-bold mb-1 text-[#144F5F]">
                                {{ $t->title }}
                            </h3>

                            <div class="flex items-center gap-2 mb-2 text-sm text-gray-600">
                                <x-heroicon-o-calendar class="w-5 h-5 text-[#144F5F]" />
                                {{ $t->duration }}
                            </div>

                            <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                                {{ $t->description }}
                            </p>

                            <a href="{{ route('layanan.show', $t->slug) }}"
                               class="mt-auto block w-full text-center py-2 rounded
                               font-semibold text-white
                               bg-gradient-to-r from-[#144F5F] to-[#73BA7D]
                               hover:opacity-90 transition">
                                Lihat Detail Kelas
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            Pagination
            @if ($trainings->hasPages())
                <div class="mt-10 flex justify-center">
                    <nav class="flex flex-wrap gap-2">

                        {{-- Prev --}}
                        @if ($trainings->onFirstPage())
                            <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded">
                                Prev
                            </span>
                        @else
                            <a href="{{ $categorySlug
                                ? url('/layanan/' . $categorySlug . '/page/' . ($trainings->currentPage() - 1))
                                : url('/layanan/page/' . ($trainings->currentPage() - 1)) }}"
                               class="px-3 py-1 bg-[#144F5F] text-white rounded">
                                Prev
                            </a>
                        @endif

                        {{-- Page Numbers --}}
                        @for ($i = 1; $i <= $trainings->lastPage(); $i++)
                            @if ($i == $trainings->currentPage())
                                <span class="px-3 py-1 rounded
                                    bg-gradient-to-r from-[#144F5F] to-[#73BA7D]
                                    text-white font-bold">
                                    {{ $i }}
                                </span>
                            @else
                                <a href="{{ $categorySlug
                                    ? url('/layanan/' . $categorySlug . '/page/' . $i)
                                    : url('/layanan/page/' . $i) }}"
                                   class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">
                                    {{ $i }}
                                </a>
                            @endif
                        @endfor

                        {{-- Next --}}
                        @if ($trainings->hasMorePages())
                            <a href="{{ $categorySlug
                                ? url('/layanan/' . $categorySlug . '/page/' . ($trainings->currentPage() + 1))
                                : url('/layanan/page/' . ($trainings->currentPage() + 1)) }}"
                               class="px-3 py-1 bg-[#144F5F] text-white rounded">
                                Next
                            </a>
                        @else
                            <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded">
                                Next
                            </span>
                        @endif

                    </nav>
                </div>
            @endif
        @else
            <div class="text-center py-20">
                <img src="{{ asset('images/update-website.jpg') }}"
                     class="mx-auto w-64 mb-6 opacity-90"
                     alt="Update layanan">
                <h2 class="text-xl font-semibold text-gray-800">
                    Layanan sedang kami update
                </h2>
                <p class="text-gray-600 mt-2">
                    Mohon ditunggu ya 🙏
                </p>
            </div>
        @endif
    </main>
</div>
@endsection
