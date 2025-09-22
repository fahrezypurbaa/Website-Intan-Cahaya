@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <img src="{{ asset('storage/'.$training->image) }}" class="w-full h-64 object-cover rounded mb-6">
    <h1 class="text-3xl font-bold mb-4">{{ $training->title }}</h1>
    <p class="text-gray-600 mb-4">{{ $training->description }}</p>

    <ul class="space-y-2 mb-6">
        @if($training->duration)<li>🗓 {{ $training->duration }}</li>@endif
        @if($training->requirement)<li>🎓 {{ $training->requirement }}</li>@endif
        @if($training->mode)<li>📌 Mode: {{ $training->mode }}</li>@endif
        <li>📂 Kategori: {{ $training->category->name }}</li>
    </ul>

    <a href="{{ route('registration.form') }}" 
       class="px-6 py-3 bg-green-600 text-white rounded font-bold hover:bg-green-700">
        Daftar Sekarang
    </a>
</div>
@endsection
