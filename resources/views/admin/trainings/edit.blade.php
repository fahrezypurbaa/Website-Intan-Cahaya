@extends('layouts.admin')

@section('title', 'Edit Training')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Edit Training</h2>

    {{-- Notifikasi error --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Update --}}
    <form action="{{ route('admin.trainings.update', $training->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Nama Training --}}
        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">Nama Training</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name', $training->name) }}"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        {{-- Deskripsi --}}
        <div>
            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi</label>
            <textarea name="description" id="description" rows="5"
                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $training->description) }}</textarea>
        </div>

        {{-- Kategori --}}
        <div>
            <label for="category_id" class="block font-medium text-sm text-gray-700">Kategori</label>
            <select name="category_id" id="category_id"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $training->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Harga --}}
        <div>
            <label for="price" class="block font-medium text-sm text-gray-700">Harga</label>
            <input type="number" name="price" id="price"
                   value="{{ old('price', $training->price) }}"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        {{-- Tombol --}}
        <div class="flex items-center gap-4">
            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Update
            </button>
            <a href="{{ route('admin.trainings.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                Batal
            </a>
        </div>
    </form>
@endsection
