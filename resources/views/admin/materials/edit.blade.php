@extends('layouts.admin')

@section('title', 'Edit Materi')

@section('content')
<div class="p-6 max-w-xl">
    <a href="{{ route('admin.materials.index') }}" 
       class="text-sm text-blue-600 mb-4 inline-block">&larr; Kembali</a>

    <h1 class="text-2xl font-bold mb-6">Edit Materi</h1>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded mb-4">
            <ul class="text-sm list-disc pl-5">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.materials.update', $material->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Training</label>
            <select name="training_id" class="w-full border p-2 rounded" required>
                @foreach($trainings as $training)
                    <option value="{{ $training->id }}" 
                        {{ old('training_id', $material->training_id) == $training->id ? 'selected' : '' }}>
                        {{ $training->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium">Kelompok</label>
            <select name="group_name" class="w-full border p-2 rounded" required>
                @foreach($groups as $group)
                    <option value="{{ $group }}" 
                        {{ old('group_name', $material->group_name) == $group ? 'selected' : '' }}>
                        {{ $group }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium">Judul Materi</label>
            <input type="text" name="title" 
                   value="{{ old('title', $material->title) }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">JP</label>
            <input type="number" name="jp" 
                   value="{{ old('jp', $material->jp) }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="flex gap-4">
            <a href="{{ route('admin.materials.index') }}" 
               class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded">
                Batal
            </a>
            <button type="submit" 
                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
