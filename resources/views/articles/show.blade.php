@extends('layouts.app')

@section('title', $article->title . ' | Intan Safety')

@section('meta')
    <meta name="description" content="{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 155) }}">
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')

    {{-- Hero --}}
    <section class="relative">
        @if ($article->thumbnail)
            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                class="w-full h-72 md:h-[28rem] object-cover" width="1920" height="500">
        @else
            <div class="w-full h-72 md:h-[28rem] bg-gray-200 flex items-center justify-center text-gray-500 text-lg">
                Tidak ada gambar
            </div>
        @endif

        <div
            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex flex-col justify-end p-8 md:p-12">
            <div class="max-w-4xl">
                <h1 class="text-3xl md:text-5xl font-bold text-white">
                    {{ $article->title }}
                </h1>

                <div class="flex flex-wrap items-center text-gray-300 text-sm mt-3 gap-2">
                    <span>{{ $article->created_at->format('d F Y') }}</span>
                    <span>•</span>
                    <span>{{ $article->author_name ?? 'Admin Intan Safety' }}</span>
                    <span>•</span>
                    <span>{{ $article->views ?? 0 }} views</span>
                    <span>•</span>
                    <span>{{ $article->reading_time }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-12 px-4 lg:px-0 max-w-5xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">

            {{-- Main Article --}}
            <article class="lg:col-span-3">

                {{-- Excerpt --}}
                @if ($article->excerpt)
                    <p class="text-lg text-gray-600 italic border-l-4 border-[#144F5F] pl-4 mb-8">
                        {{ $article->excerpt }}
                    </p>
                @endif

                {{-- Body --}}
                <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
                    {!! $article->content !!}
                </div>

                {{-- Share --}}
                <section class="mt-12 pt-6 border-t">
                    <h2 class="text-lg font-semibold text-[#144F5F] mb-4">
                        Bagikan Artikel Ini
                    </h2>

                    <div class="flex items-center gap-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                            target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:text-blue-800">
                            Facebook
                        </a>

                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}"
                            target="_blank" rel="noopener noreferrer" class="text-sky-500 hover:text-sky-700">
                            Twitter
                        </a>

                        <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->fullUrl()) }}"
                            target="_blank" rel="noopener noreferrer" class="text-green-600 hover:text-green-700">
                            WhatsApp
                        </a>
                    </div>
                </section>
            </article>

            {{-- Sidebar --}}
            <aside class="lg:col-span-1 space-y-8">

                {{-- Related Articles --}}
                <section class="bg-white shadow rounded-xl p-5 border border-gray-100">
                    <h2 class="font-semibold text-[#144F5F] mb-4">
                        Artikel Terkait
                    </h2>

                    <ul class="space-y-3">
                        @forelse ($relatedArticles as $rel)
                            <li>
                                <a href="{{ route('articles.show', $rel->slug) }}"
                                    class="flex gap-3 items-center hover:text-[#144F5F] transition">
                                    @if ($rel->thumbnail)
                                        <img src="{{ asset('storage/' . $rel->thumbnail) }}" alt="{{ $rel->title }}"
                                            class="w-14 h-14 object-cover rounded-lg border border-gray-200" width="56"
                                            height="56">
                                    @else
                                        <div
                                            class="w-14 h-14 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 text-xs">
                                            No Img
                                        </div>
                                    @endif

                                    <div>
                                        <p class="text-sm font-medium line-clamp-2">
                                            {{ $rel->title }}
                                        </p>
                                        <span class="text-xs text-gray-400">
                                            {{ $rel->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="text-sm text-gray-500">
                                Belum ada artikel lain.
                            </li>
                        @endforelse
                    </ul>
                </section>

                {{-- Author --}}
                @if ($article->author_name)
                    <section class="bg-white shadow rounded-xl p-5 border border-gray-100">
                        <h2 class="font-semibold text-[#144F5F] mb-3">
                            Tentang Penulis
                        </h2>

                        <p class="text-gray-700 font-medium">
                            {{ $article->author_name }}
                        </p>

                        @if ($article->author_bio)
                            <p class="text-gray-500 text-sm mt-1">
                                {{ $article->author_bio }}
                            </p>
                        @endif
                    </section>
                @endif

            </aside>
        </div>
    </section>

@endsection
