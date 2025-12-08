@extends('layouts.app')
@section('title', 'Artikel - Intan Safety')
@section('content')

    {{-- Banner --}}
    <div class="relative">
        <img src="{{ asset('images/hubungi-kami-banner.png') }}" alt="artikel"
            class="w-full h-64 object-cover rounded-lg shadow-md">
        <div class="absolute inset-0 bg-gradient-to-r from-[#144F5F]/70 to-[#73BA7D]/70 flex items-center justify-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow">
                ARTIKEL & BLOG 
            </h1>
        </div>
    </div>

    <div class="bg-[#F3F7F0] py-16">

        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <p class="text-sm font-medium text-green-700 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6h4m6 6V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2h10" />
                        </svg>
                        RECENT BLOGS
                    </p>
                    <h2 class="mt-2 text-3xl font-bold text-[#144F5F] leading-snug">
                        Journeys of Discovery <br> Uncovering Hidden
                    </h2>
                </div>
            </div>

            <!-- Blog Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($articles as $article)
                    <div
                        class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 hover:shadow-lg transition">
                        <!-- Thumbnail -->
                        <img src="{{ $article->thumbnail ? asset('storage/' . $article->thumbnail) : 'https://via.placeholder.com/400x250?text=No+Image' }}"
                            alt="{{ $article->title }}" class="w-full h-56 object-cover">

                        <div class="p-5">
                            <!-- Meta Info -->
                            <div class="flex items-center text-sm text-gray-500 mb-3 gap-4">
                                <!-- Tanggal -->
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $article->created_at->format('F j, Y') }}
                                </span>
                                <!-- Author -->
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5.121 17.804A9.935 9.935 0 0112 15c2.21 0 4.235.716 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    By {{ $article->user->name ?? 'admin' }}
                                </span>
                            </div>

                            <!-- Judul -->
                            <h3 class="text-lg font-semibold text-green-800 mb-2 line-clamp-2">
                                <a href="{{ route('articles.show', $article->slug) }}" class="hover:underline">
                                    {{ $article->title }}
                                </a>
                            </h3>

                            <!-- Ringkasan -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}
                            </p>

                            <!-- Tombol Read More -->
                            <a href="{{ route('articles.show', $article->slug) }}"
                                class="text-green-700 font-medium flex items-center gap-1 hover:underline">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
