@extends('layouts.admin')

@section('title', 'Tambah Materi')

@section('content')
    <x-admin.form-wrapper 
        title="📚 Tambah Materi"
        action="{{ route('admin.materials.store') }}"
        method="POST"
        submit="✅ Simpan Materi"
        back="{{ route('admin.materials.index') }}"
    >
        {{-- Training --}}
        <div>
            <label class="block font-medium mb-1">Training</label>
            <select name="training_id" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Training --</option>
                @foreach($trainings as $training)
                    <option value="{{ $training->id }}" 
                        {{ old('training_id') == $training->id ? 'selected' : '' }}>
                        {{ $training->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Kelompok --}}
        <div>
            <label class="block font-medium mb-1">Kelompok</label>
            <select name="group_name" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Kelompok --</option>
                @foreach($groups as $group)
                    <option value="{{ $group }}" 
                        {{ old('group_name') == $group ? 'selected' : '' }}>
                        {{ $group }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Judul Materi --}}
        <div>
            <label class="block font-medium mb-1">Judul Materi</label>
            <input type="text" name="title" 
                   value="{{ old('title') }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        {{-- JP --}}
        <div>
            <label class="block font-medium mb-1">JP</label>
            <input type="number" name="jp" 
                   value="{{ old('jp') }}" 
                   class="w-full border p-2 rounded" required>
        </div>
    </x-admin.form-wrapper>
@endsection
