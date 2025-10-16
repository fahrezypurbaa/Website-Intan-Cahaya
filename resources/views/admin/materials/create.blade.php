@extends('layouts.admin')

@section('title', 'Tambah Materi')

@section('content')
    <x-admin.form-wrapper 
        title="📚 Tambah Materi" 
        action="{{ route('admin.materials.store') }}" 
        method="POST"
        submitLabel="💾 Simpan Materi"
        back="{{ route('admin.materials.index') }}"
    >
        {{-- Pilih Training --}}
        <div>
            <label class="block font-medium mb-1 text-gray-700">Training</label>
            <select name="training_id" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Training --</option>
                @foreach ($trainings as $training)
                    <option value="{{ $training->id }}">{{ $training->title }}</option>
                @endforeach
            </select>
        </div>

        {{-- Pilih Kelompok --}}
        <div>
            <label class="block font-medium mb-1 text-gray-700">Kelompok</label>
            <select name="group_name" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Kelompok --</option>
                @foreach ($groups as $group)
                    <option value="{{ $group }}">{{ $group }}</option>
                @endforeach
            </select>
        </div>

        {{-- Multi Materi --}}
        <div x-data="{ rows: [{ title: '', jp: '' }] }" class="mt-6">
            <div class="flex justify-between items-center mb-3">
                <label class="font-semibold text-gray-800">Daftar Materi</label>
                <button type="button" 
                    @click="rows.push({ title: '', jp: '' })"
                    class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow hover:scale-105 transform transition">
                    + Tambah Baris
                </button>
            </div>

            <template x-for="(row, index) in rows" :key="index">
                <div class="grid grid-cols-12 gap-2 mb-2">
                    <div class="col-span-8">
                        <input type="text" 
                            x-model="row.title" 
                            :name="`materials[${index}][title]`"
                            placeholder="Judul Materi" 
                            class="w-full border p-2 rounded" 
                            required>
                    </div>
                    <div class="col-span-3">
                        <input type="number" 
                            x-model="row.jp" 
                            :name="`materials[${index}][jp]`" 
                            placeholder="JP"
                            class="w-full border p-2 rounded">
                    </div>
                    <div class="col-span-1 flex items-center justify-center">
                        <button type="button" 
                            @click="rows.splice(index, 1)" 
                            class="text-red-600 hover:underline">
                            🗑️
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </x-admin.form-wrapper>
@endsection
