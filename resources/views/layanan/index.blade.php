@extends('layouts.app')

@section('title', 'Layanan Pelatihan & Sertifikasi - Intan Safety')

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-4 grid grid-cols-1 lg:grid-cols-[16rem_1fr] gap-8">

        {{-- ================= SIDEBAR KATEGORI ================= --}}
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

        {{-- ================= MAIN CONTENT ================= --}}
        <main>

            {{-- Judul --}}
            <h1 class="text-3xl font-extrabold text-[#144F5F] mb-8 border-b-4 inline-block pb-1">
                @if (!empty($categorySlug))
                    {{ ucwords(str_replace('-', ' ', $categorySlug)) }}
                @else
                    Layanan Pelatihan & Sertifikasi Intan Safety
                @endif
            </h1>

            {{-- SEARCH --}}
            <form method="GET" action="{{ $categorySlug ? url('/layanan/' . $categorySlug) : url('/layanan') }}"
                class="mb-8">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari pelatihan..."
                    class="w-full max-w-md px-4 py-2 rounded-lg border border-gray-300
               focus:ring-2 focus:ring-[#73BA7D] focus:outline-none">
            </form>

            {{-- ================= LIST TRAINING ================= --}}
            @if ($trainings->count())
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach ($trainings as $t)
                        <div
                            class="bg-white rounded-xl shadow-md hover:shadow-xl
                        overflow-hidden transition transform hover:-translate-y-1
                        border border-gray-100 flex flex-col">

                            {{-- Image --}}
                            <img src="{{ asset('storage/' . $t->image) }}" alt="{{ $t->title }}"
                                class="h-40 w-full object-cover">

                            {{-- Content --}}
                            <div class="p-5 flex flex-col flex-1">

                                {{-- Badge --}}
                                <div class="flex flex-wrap gap-2 mb-2">
                                    @if ($t->mode)
                                        <span
                                            class="px-2 py-1 text-xs rounded
                                        bg-gradient-to-r from-[#144F5F]/20 to-[#73BA7D]/20 text-[#144F5F]">
                                            {{ $t->mode }}
                                        </span>
                                    @endif

                                    <span class="px-2 py-1 text-xs rounded bg-[#144F5F]/10 text-[#144F5F]">
                                        {{ $t->category->name }}
                                    </span>
                                </div>

                                {{-- Title --}}
                                <h3 class="text-lg font-bold text-[#144F5F] mb-1">
                                    {{ $t->title }}
                                </h3>

                                {{-- Duration --}}
                                <div class="flex items-center gap-2 mb-2">
                                    <x-heroicon-o-calendar class="w-5 h-5 text-[#144F5F]" />
                                    <p class="text-sm text-gray-600">
                                        {{ $t->duration }}
                                    </p>
                                </div>

                                {{-- Desc --}}
                                <p class="text-sm text-gray-600 line-clamp-3 mb-4">
                                    {{ $t->description }}
                                </p>

                                {{-- Button --}}
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

                @php
                    $q = request('q');
                    $current = $trainings->currentPage();
                @endphp

                {{-- ================= PAGINATION ================= --}}
                @if ($trainings->hasPages())
                    <div class="mt-10">

                        {{-- ===== MOBILE ===== --}}
                        <div class="flex justify-between items-center sm:hidden">

                            {{-- Prev --}}
                            @if ($trainings->onFirstPage())
                                <span class="px-4 py-2 bg-gray-200 text-gray-500 rounded">Prev</span>
                            @else
                                <a href="{{ ($categorySlug
                                    ? url('/layanan/' . $categorySlug . '/page/' . ($current - 1))
                                    : url('/layanan/page/' . ($current - 1))) . ($q ? '?q=' . urlencode($q) : '') }}"
                                    class="px-4 py-2 bg-[#144F5F] text-white rounded">
                                    Prev
                                </a>
                            @endif

                            {{-- Info --}}
                            <span class="text-sm font-medium text-gray-700">
                                {{ $trainings->currentPage() }} / {{ $trainings->lastPage() }}
                            </span>

                            {{-- Next --}}
                            @if ($trainings->hasMorePages())
                                <a href="{{ ($categorySlug
                                    ? url('/layanan/' . $categorySlug . '/page/' . ($current + 1))
                                    : url('/layanan/page/' . ($current + 1))) . ($q ? '?q=' . urlencode($q) : '') }}"
                                    class="px-4 py-2 bg-[#144F5F] text-white rounded">
                                    Next
                                </a>
                            @else
                                <span class="px-4 py-2 bg-gray-200 text-gray-500 rounded">Next</span>
                            @endif
                        </div>

                        {{-- ===== DESKTOP ===== --}}
                        <div class="hidden sm:flex justify-center">
                            <nav class="flex gap-2">

                                @php
                                    $last = $trainings->lastPage();
                                    $block = 10;
                                    if ($current >= 9) {
                                        $start = max(1, $current - 8);
                                    } else {
                                        $start = 1;
                                    }
                                    $end = min($start + $block - 1, $last);
                                @endphp

                                {{-- Prev --}}
                                @if (!$trainings->onFirstPage())
                                    <a href="{{ ($categorySlug
                                        ? url('/layanan/' . $categorySlug . '/page/' . ($current - 1))
                                        : url('/layanan/page/' . ($current - 1))) . ($q ? '?q=' . urlencode($q) : '') }}"
                                        class="px-3 py-1 bg-[#144F5F] text-white rounded">
                                        Prev
                                    </a>
                                @endif

                                {{-- Pages --}}
                                @for ($page = $start; $page <= $end; $page++)
                                    @if ($page == $current)
                                        <span
                                            class="px-3 py-1 rounded text-white font-bold
                                        bg-gradient-to-r from-[#144F5F] to-[#73BA7D]">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ ($categorySlug ? url('/layanan/' . $categorySlug . '/page/' . $page) : url('/layanan/page/' . $page)) .
                                            ($q ? '?q=' . urlencode($q) : '') }}"class="px-3 py-1 rounded text-bg-gradient-to-r from-[#144F5F] to-[#73BA7D] font-bold
                                           white">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endfor

                                {{-- Next --}}
                                @if ($trainings->hasMorePages())
                                    <a
                                        href="{{ ($categorySlug
                                            ? url('/layanan/' . $categorySlug . '/page/' . ($current + 1))
                                            : url('/layanan/page/' . ($current + 1))) . ($q ? '?q=' . urlencode($q) : '') }}"class="px-3 py-1 bg-[#144F5F] text-white rounded">
                                        Next
                                    </a>
                                @endif
                            </nav>
                        </div>
                    </div>
                @endif

            @else
                {{-- EMPTY STATE --}}
                <div class="text-center py-20">
                    <img src="{{ asset('images/update-website.jpg') }}" class="w-64 mx-auto mb-6 opacity-90">
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
