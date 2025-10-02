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
    @forelse($galleries as $g)
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
            <div class="relative group">
                <img src="{{ asset('storage/' . $g->image) }}" 
                     class="w-full h-40 object-cover group-hover:scale-105 transform transition duration-300">
                
                <!-- Overlay hover -->
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-2">
                    <!-- Edit -->
                    <a href="{{ route('admin.galleries.edit', $g) }}"
                       class="px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-medium rounded shadow-sm transition">
                        ✏️ Edit
                    </a>
                    <!-- Delete -->
                    <form action="{{ route('admin.galleries.destroy', $g) }}" method="POST" 
                          onsubmit="return confirm('Hapus foto ini?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded shadow-sm transition">
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
    @empty
        <div class="col-span-4 text-center text-gray-500 py-10">
            Belum ada foto di gallery.
        </div>
    @endforelse
</div>

<div class="mt-6">
    {{ $galleries->links() }}
</div>
@endsection
