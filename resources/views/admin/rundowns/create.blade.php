@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Rundown Training</h1>

    <form action="{{ route('admin.rundowns.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Training</label>
            <select name="training_id" class="w-full border rounded p-2" required>
                <option value="">Pilih Training</option>
                @foreach($trainings as $training)
                    <option value="{{ $training->id }}" {{ old('training_id') == $training->id ? 'selected' : '' }}>
                        {{ $training->title }}
                    </option>
                @endforeach
            </select>
            @error('training_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium">Hari ke-</label>
            <input type="number" name="day" class="w-full border rounded p-2" 
                   value="{{ old('day') }}" min="1" required>
            @error('day') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium">Waktu</label>
            <input type="text" name="time" class="w-full border rounded p-2" 
                   value="{{ old('time') }}" placeholder="Contoh: 08:00 - 16:00" required>
            @error('time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium">Instruktur</label>
            <input type="text" name="instructor" class="w-full border rounded p-2" 
                   value="{{ old('instructor') }}" placeholder="Nama instruktur">
            @error('instructor') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
            <a href="{{ route('admin.rundowns.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Batal</a>
        </div>
    </form>
</div>
@endsection