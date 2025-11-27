@extends('layouts.admin')

@section('title', 'Tambah Materi')

@section('content')
    <x-admin.form-wrapper title="📚 Tambah Materi" action="{{ route('admin.materials.store') }}" method="POST"
        submitLabel="💾 Simpan Materi" back="{{ route('admin.materials.index') }}">
        <div x-data="{
            category: '',
            rows: [{ title: '', jp: '', kode_unit: '' }],
            updateCategory(e) {
                const selected = e.target.options[e.target.selectedIndex];
                this.category = selected.dataset.category || '';
            }
        }">

            {{-- Pilih Training --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Training</label>
                <select name="training_id" id="trainingSelect" class="w-full border p-2 rounded" required
                    @change="updateCategory($event)">
                    <option value="">-- Pilih Training --</option>
                    @foreach ($trainings as $training)
                        <option value="{{ $training->id }}" data-category="{{ $training->category->name ?? '' }}">
                            {{ $training->title }} ({{ $training->category->name ?? 'Tanpa Kategori' }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Pilih Kelompok (hanya untuk Kemnaker) --}}
            <div x-show="category.toLowerCase().includes('kemnaker')" x-cloak>
                <label class="block font-medium mb-1 text-gray-700 mt-3">Kelompok</label>
                <select name="group_name" class="w-full border p-2 rounded">
                    <option value="">-- Pilih Kelompok --</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group }}">{{ $group }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Daftar Materi Dinamis --}}
            <div class="mt-6">
                <div class="flex justify-between items-center mb-3">
                    <label class="font-semibold text-gray-800">Daftar Materi</label>
                    <button type="button" @click="rows.push({ title: '', jp: '', kode_unit: '' })"
                        class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow hover:scale-105 transform transition">
                        + Tambah Baris
                    </button>
                </div>

                <template x-for="(row, index) in rows" :key="index">
                    <div class="grid grid-cols-12 gap-2 mb-2">

                        {{-- Jika kategori termasuk Kemnaker --}}
                        <template x-if="category.toLowerCase().includes('kemnaker')">
                            <div class="contents">
                                <div class="col-span-8">
                                    <input type="text" x-model="row.title" :name="`materials[${index}][title]`"
                                        placeholder="Judul Materi" class="w-full border p-2 rounded" required>
                                </div>
                                <div class="col-span-3">
                                    <input type="number" x-model="row.jp" :name="`materials[${index}][jp]`"
                                        placeholder="JP" class="w-full border p-2 rounded">
                                </div>
                            </div>
                        </template>

                        {{-- Jika kategori BNSP dan PPSDM MIGAS --}}
                        <template x-if="!category.toLowerCase().includes('kemnaker') && category !== ''">
                            <div class="contents">
                                <div class="col-span-4">
                                    <input type="text" x-model="row.kode_unit" :name="`materials[${index}][kode_unit]`"
                                        placeholder="Kode Unit (misal M.71KKK01.001.1)" class="w-full border p-2 rounded">
                                </div>
                                <div class="col-span-7">
                                    <input type="text" x-model="row.title" :name="`materials[${index}][title]`"
                                        placeholder="Judul Uji Kompetensi" class="w-full border p-2 rounded" required>
                                </div>
                            </div>
                        </template>

                        {{-- Tombol hapus --}}
                        <div class="col-span-1 flex items-center justify-center">
                            <button type="button" @click="rows.splice(index, 1)" class="text-red-600 hover:underline">
                                🗑️
                            </button>
                        </div>
                    </div>
                </template>

                {{-- Pesan jika belum pilih training --}}
                <div x-show="category === ''" class="text-sm text-gray-500 mt-3">
                    ⚠️ Pilih training terlebih dahulu untuk menentukan format tabel materi.
                </div>
            </div>
        </div>
    </x-admin.form-wrapper>
@endsection
