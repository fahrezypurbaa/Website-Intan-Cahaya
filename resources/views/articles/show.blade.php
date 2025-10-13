@extends('layouts.app')

@section('title', $article->title . ' - Intan Safety')

@section('content')

{{-- Hero Banner --}}
<div class="relative">
    @if($article->thumbnail)
        <img src="{{ asset('storage/' . $article->thumbnail) }}" 
            alt="{{ $article->title }}" 
            class="w-full h-72 md:h-[28rem] object-cover">
    @else
        <div class="w-full h-72 md:h-[28rem] bg-gray-200 flex items-center justify-center text-gray-500 text-lg">
            Tidak ada gambar
        </div>
    @endif

    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex flex-col justify-end p-8 md:p-12">
        <div class="max-w-4xl">
            <h1 class="text-3xl md:text-5xl font-bold text-white mt-2">
                {{ $article->title }}
            </h1>
            <div class="flex items-center text-gray-300 text-sm mt-3 space-x-3">
                <span>{{ $article->created_at->format('d F Y') }}</span>
                <span>•</span>
                <span>{{ $article->author_name ?? 'Admin' }}</span>
                <span>•</span>
                <span>{{ $article->views ?? 0 }} Views</span>
                <span>•</span>
                <span>{{ $article->reading_time }}</span>
            </div>
        </div>
    </div>
</div>

{{-- Artikel Konten --}}
<section class="py-12 px-4 lg:px-0 max-w-5xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
        {{-- Konten Utama --}}
        <article class="lg:col-span-3">
            {{-- Excerpt (Ringkasan) --}}
            @if($article->excerpt)
                <p class="text-lg text-gray-600 italic border-l-4 border-[#144F5F] pl-4 mb-8">
                    "{{ $article->excerpt }}"
                </p>
            @endif

            {{-- Isi Konten --}}
            <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
                {!! nl2br(e($article->content)) !!}
            </div>

            {{-- Bagian Share --}}
            <div class="mt-12 pt-6 border-t">
                <h3 class="text-lg font-semibold text-[#144F5F] mb-3">Bagikan Artikel Ini:</h3>
                <div class="flex items-center gap-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                        target="_blank" 
                        class="text-blue-600 hover:text-blue-800 transition">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}" 
                        target="_blank" 
                        class="text-sky-500 hover:text-sky-700 transition">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->fullUrl()) }}" 
                        target="_blank" 
                        class="text-green-600 hover:text-green-700 transition">
                        <i class="fab fa-whatsapp fa-lg"></i>
                    </a>
                </div>
            </div>
        </article>

        {{-- Sidebar --}}
        <aside class="lg:col-span-1">
            {{-- Artikel Terkait --}}
            <div class="bg-white shadow rounded-xl p-5 border border-gray-100">
                <h3 class="font-semibold text-[#144F5F] mb-4">Artikel Terkait</h3>
                <ul class="space-y-3">
                    @forelse($relatedArticles as $rel)
                        <li>
                            <a href="{{ route('articles.show', $rel->slug) }}" class="flex gap-3 items-center hover:text-[#144F5F] transition">
                                @if($rel->thumbnail)
                                    <img src="{{ asset('storage/' . $rel->thumbnail) }}" class="w-14 h-14 object-cover rounded-lg border border-gray-200">
                                @else
                                    <div class="w-14 h-14 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 text-xs">
                                        No Img
                                    </div>
                                @endif
                                <div>
                                    <p class="text-sm font-medium line-clamp-2">{{ $rel->title }}</p>
                                    <span class="text-xs text-gray-400">{{ $rel->created_at->format('d M Y') }}</span>
                                </div>
                            </a>
                        </li>
                    @empty
                        <p class="text-sm text-gray-500">Belum ada artikel lain.</p>
                    @endforelse
                </ul>
            </div>

            {{-- Tentang Penulis --}}
            @if($article->author_name)
                <div class="bg-white shadow rounded-xl p-5 border border-gray-100 mt-8">
                    <h3 class="font-semibold text-[#144F5F] mb-3">Tentang Penulis</h3>
                    <p class="text-gray-700 font-medium">{{ $article->author_name }}</p>
                    @if($article->author_bio)
                        <p class="text-gray-500 text-sm mt-1">{{ $article->author_bio }}</p>
                    @endif
                </div>
            @endif
        </aside>
    </div>
</section>
@endsection
