@extends('layouts.app')

@section('content')
    {{-- Banner gambar artikel --}}
    <div class="relative">
        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
            class="w-full h-72 md:h-96 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white text-center">
                {{ $article->title }}
            </h1>
        </div>
    </div>

    {{-- Konten artikel --}}
    <section class="py-12 px-4 max-w-5xl mx-auto">
        <p class="text-gray-500 text-sm mb-6">
            {{ $article->created_at->format('F d, Y') }} • by Admin
        </p>

        <div class="prose max-w-none">
            {!! nl2br(e($article->content)) !!}
        </div>
    </section>
@endsection
