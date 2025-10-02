@extends('layouts.admin')

@section('title', 'Tambah Rundown Training')

@section('content')
    <x-admin.form-wrapper 
        title="📅 Tambah Rundown Training"
        action="{{ route('admin.rundowns.store') }}"
        method="POST"
        submit="✅ Simpan Rundown"
        back="{{ route('admin.rundowns.index') }}"
    >
        {{-- Training --}}
        <div>
            <label class="block font-medium mb-1">Training</label>
            <select name="training_id" class="w-full border rounded p-2" required>
                <option value="">Pilih Training</option>
                @foreach($trainings as $training)
                    <option value="{{ $training->id }}" {{ old('training_id') == $training->id ? 'selected' : '' }}>
                        {{ $training->title }}
                    </option>
                @endforeach
            </select>
            @error('training_id') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Hari ke- --}}
        <div>
            <label class="block font-medium mb-1">Hari ke-</label>
            <input type="number" name="day" class="w-full border rounded p-2" 
                   value="{{ old('day') }}" min="1" required>
            @error('day') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Waktu --}}
        <div>
            <label class="block font-medium mb-1">Waktu</label>
            <input type="text" name="time" class="w-full border rounded p-2" 
                   value="{{ old('time') }}" placeholder="Contoh: 08:00 - 16:00" required>
            @error('time') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        {{-- Instruktur --}}
        <div>
            <label class="block font-medium mb-1">Instruktur</label>
            <input type="text" name="instructor" class="w-full border rounded p-2" 
                   value="{{ old('instructor') }}" placeholder="Nama instruktur">
            @error('instructor') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>
    </x-admin.form-wrapper>
@endsection
