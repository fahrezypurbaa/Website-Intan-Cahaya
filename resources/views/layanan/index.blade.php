@extends('layouts.app')

@section('title', 'Layanan Pelatihan & Sertifikasi - Intan Safety')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4 flex gap-6">

    {{-- Sidebar kategori --}}
    <aside class="w-64">
        <h3 class="font-bold text-lg mb-4">Kategori</h3>
        <ul class="space-y-2">
            @foreach($categories as $cat)
                <li>
                    <a href="{{ route('layanan.index',['category'=>$cat->slug]) }}"
                       class="block px-3 py-2 rounded 
                       {{ request('category')==$cat->slug ? 'bg-green-600 text-white':'hover:bg-gray-100' }}">
                        {{ $cat->name }}
                    </a>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('registration.form') }}" 
           class="mt-6 block text-center px-4 py-2 bg-yellow-500 text-white rounded font-bold">
            📋 Formulir Registrasi
        </a>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1">
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($trainings as $t)
                <div class="bg-white rounded-lg shadow hover:shadow-lg overflow-hidden">
                    <img src="{{ asset('storage/'.$t->image) }}" class="h-40 w-full object-cover">
                    <div class="p-4">
                        <div class="flex gap-2 mb-2">
                            @if($t->mode)
                                <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">{{ $t->mode }}</span>
                            @endif
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">{{ $t->category->name }}</span>
                        </div>
                        <h3 class="text-lg font-bold">{{ $t->title }}</h3>
                        <p class="text-gray-600 text-sm">🗓 {{ $t->duration }}</p>
                        @if($t->requirement)
                            <p class="text-gray-600 text-sm">🎓 {{ $t->requirement }}</p>
                        @endif
                        <a href="{{ route('layanan.show',$t->slug) }}" 
                           class="mt-3 block w-full text-center bg-yellow-500 text-white py-2 rounded font-semibold">
                           Lihat Detail Kelas
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $trainings->links() }}
        </div>
    </main>
</div>
@endsection
