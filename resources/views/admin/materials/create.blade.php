@extends('layouts.admin')

@section('title', 'Tambah Materi')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Materi</h1>

    <form action="{{ route('admin.materials.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Training</label>
            <select name="training_id" class="w-full border p-2 rounded">
                @foreach($trainings as $training)
                    <option value="{{ $training->id }}">{{ $training->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium">Kelompok</label>
            <select name="group_name" class="w-full border p-2 rounded">
                @foreach($groups as $group)
                    <option value="{{ $group }}">{{ $group }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium">Judul Materi</label>
            <input type="text" name="title" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">JP</label>
            <input type="number" name="jp" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
    </form>
</div>
@endsection
