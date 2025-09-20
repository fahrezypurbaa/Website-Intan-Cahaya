@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-bold">Gallery</h2>
    <a href="{{ route('admin.galleries.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Foto</a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
@endif

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @foreach($galleries as $g)
        <div class="bg-white rounded overflow-hidden shadow">
            <img src="{{ asset('storage/' . $g->image) }}" class="w-full h-40 object-cover">
            <div class="p-2">
                <div class="text-sm font-semibold">{{ $g->title ?? '-' }}</div>
                <div class="text-xs text-gray-500">{{ $g->category ?? '-' }}</div>
                <form action="{{ route('admin.galleries.destroy', $g) }}" method="POST" class="mt-2">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus foto?')" class="text-red-600 text-sm">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $galleries->links() }}
</div>
@endsection
