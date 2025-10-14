@extends('layouts.admin')

@section('title', 'Tambah Rundown')

@section('content')
    <x-admin.form-wrapper title="📅 Tambah Rundown" action="{{ route('admin.rundowns.store') }}" method="POST"
        submit="Simpan Rundown Berhasil !" back="{{ route('admin.rundowns.index') }}">
        {{-- Pilih Training --}}
        <div>
            <label class="block font-medium mb-1">Training / Pelatihan</label>
            <select name="training_id" class="w-full border p-2 rounded focus:ring focus:ring-green-200" required>
                <option value="">-- Pilih Training --</option>
                @foreach ($trainings as $training)
                    <option value="{{ $training->id }}">{{ $training->title }}</option>
                @endforeach
            </select>
        </div>

        {{-- Input Dinamis Hari / Waktu / Instruktur --}}
        <div x-data="{ rundowns: [{ day: '', time: '', instructor: '' }] }" class="mt-6 space-y-3">
            <h3 class="font-semibold text-gray-700 mb-2">Daftar Rundown</h3>

            <template x-for="(item, index) in rundowns" :key="index">
                <div class="grid grid-cols-12 gap-3 bg-white p-3 border rounded-lg shadow-sm items-center">
                    {{-- Hari --}}
                    <div class="col-span-3">
                        <input type="text" :name="`rundowns[${index}][day]`" x-model="item.day" placeholder="Hari ke-1"
                            class="w-full border p-2 rounded focus:ring focus:ring-green-200" required>
                    </div>

                    {{-- Waktu --}}
                    <div class="col-span-3">
                        <input type="text" :name="`rundowns[${index}][time]`" x-model="item.time"
                            placeholder="08.00 - 16.00" class="w-full border p-2 rounded focus:ring focus:ring-green-200"
                            required>
                    </div>

                    {{-- Instruktur --}}
                    <div class="col-span-3">
                        <input type="text" :name="`rundowns[${index}][instructor]`" x-model="item.instructor"
                            placeholder="Instruktur" class="w-full border p-2 rounded focus:ring focus:ring-green-200"
                            required>
                    </div>

                    {{-- Tombol Hapus --}}
                    <div class="col-span-1 flex items-center justify-center">
                        <button type="button" @click="rundowns.splice(index, 1)" class="text-red-600 hover:underline">
                            🗑️
                        </button>

                    </div>
                </div>
            </template>

            {{-- Tombol Tambah Baris --}}
            <div class="flex justify-end pt-2">
                <button type="button" @click="rundowns.push({ day: '', time: '', instructor: '' })"
                    class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow hover:scale-105 transform transition">
                    + Tambah Baris
                </button>
            </div>
        </div>
    </x-admin.form-wrapper>
@endsection
