@extends('layouts.admin')

@section('title', 'Edit Materi')

@section('content')
    <x-admin.form-wrapper title="✏️ Edit Materi" action="{{ route('admin.materials.update', $material) }}" method="POST"
        submitLabel="💾 Update Materi" back="{{ route('admin.materials.index') }}">
        @method('PUT')

        <div x-data="{
            category: '{{ strtolower($material->training->category->name ?? '') }}',
            updateCategory(e) {
                const selected = e.target.options[e.target.selectedIndex];
                this.category = (selected.dataset.category || '').toLowerCase();
            }
        }">
            {{-- Pilih Training --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Training</label>
                <select name="training_id" class="w-full border p-2 rounded" required @change="updateCategory($event)">
                    @foreach ($trainings as $training)
                        <option value="{{ $training->id }}" data-category="{{ $training->category->name ?? '' }}"
                            {{ $material->training_id == $training->id ? 'selected' : '' }}>
                            {{ $training->title }} ({{ $training->category->name ?? 'Tanpa Kategori' }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Kelompok (hanya untuk Kemnaker) --}}
            <div x-show="category.includes('kemnaker')" x-cloak>
                <label class="block font-medium mb-1 text-gray-700 mt-3">Kelompok</label>
                <select name="group_name" class="w-full border p-2 rounded">
                    <option value="">-- Pilih Kelompok --</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group }}" {{ $material->group_name == $group ? 'selected' : '' }}>
                            {{ $group }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Input dinamis berdasarkan kategori --}}
            <div class="mt-6">
                {{-- Kategori Kemnaker --}}
                <template x-if="category.includes('kemnaker')">
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-8">
                            <label class="block font-medium mb-1 text-gray-700">Judul Materi</label>
                            <input type="text" name="title" value="{{ old('title', $material->title) }}"
                                placeholder="Judul Materi" class="w-full border p-2 rounded" required>
                        </div>
                        <div class="col-span-3">
                            <label class="block font-medium mb-1 text-gray-700">JP</label>
                            <input type="number" name="jp" value="{{ old('jp', $material->jp) }}" placeholder="JP"
                                class="w-full border p-2 rounded">
                        </div>
                    </div>
                </template>

                {{-- Kategori BNSP atau lainnya --}}
                <template x-if="!category.includes('kemnaker') && category !== ''">
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-4">
                            <label class="block font-medium mb-1 text-gray-700">Kode Unit</label>
                            <input type="text" name="kode_unit" value="{{ old('kode_unit', $material->kode_unit) }}"
                                placeholder="Misal: M.71KKK01.001.1" class="w-full border p-2 rounded">
                        </div>
                        <div class="col-span-8">
                            <label class="block font-medium mb-1 text-gray-700">Judul Uji Kompetensi</label>
                            <input type="text" name="title" value="{{ old('title', $material->title) }}"
                                placeholder="Judul Uji Kompetensi" class="w-full border p-2 rounded" required>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </x-admin.form-wrapper>
@endsection
