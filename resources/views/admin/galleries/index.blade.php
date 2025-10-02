@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">🖼️ Gallery</h2>
    <a href="{{ route('admin.galleries.create') }}"
       class="px-4 py-2 bg-gradient-to-r from-[#73BA7D] to-[#4ca56c] text-white rounded-lg shadow hover:scale-105 transform transition">
       + Tambah Foto
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 border border-green-200">
        ✅ {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    @foreach($galleries as $g)
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
            <div class="relative group">
                <img src="{{ asset('storage/' . $g->image) }}" 
                     class="w-full h-40 object-cover group-hover:scale-105 transform transition duration-300">
                
                <!-- Overlay hover -->
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                    <form action="{{ route('admin.galleries.destroy', $g) }}" method="POST" 
                          onsubmit="return confirm('Hapus foto ini?')">
                        @csrf @method('DELETE')
                        <button class="px-3 py-1.5 bg-red-600 text-white text-sm rounded shadow hover:bg-red-700 transition">
                            🗑️ Hapus
                        </button>
                    </form>
                </div>
            </div>

            <div class="p-3">
                <div class="font-semibold text-gray-800 truncate">{{ $g->title ?? '-' }}</div>
                <div class="text-xs text-gray-500">{{ $g->category ?? '-' }}</div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-6">
    {{ $galleries->links() }}
</div>
@endsection
