@extends('layouts.admin')

@section('title', 'Tambah Foto Gallery')

@section('content')
    <div class="max-w-xl mx-auto py-8">
        <!-- Back button -->
        <a href="{{ route('admin.galleries.index') }}" 
           class="text-sm text-blue-600 mb-6 inline-flex items-center hover:underline">
            &larr; Kembali ke Gallery
        </a>

        <!-- Error notification -->
        @if ($errors->any())
            <div class="mb-4 p-4 rounded-lg border border-red-200 bg-red-50 text-red-700">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Card form -->
        <div class="bg-white shadow rounded-xl p-6 border border-gray-100">
            <h1 class="text-xl font-bold mb-6 text-gray-800">🖼️ Tambah Foto Gallery</h1>

            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium mb-1">Judul</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           class="w-full border rounded-lg p-2.5 focus:ring focus:ring-green-200 focus:border-green-400" 
                           placeholder="Masukkan judul foto">
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium mb-1">Kategori</label>
                    <select name="category" 
                            class="w-full border rounded-lg p-2.5 focus:ring focus:ring-green-200 focus:border-green-400">
                        <option disabled selected>-- Pilih kategori --</option>
                        <option value="JURU LAS SURABAYA 4-8 AGUSTUS 2025">JURU LAS SURABAYA 4-8 AGUSTUS 2025</option>
                        <option value="TOT LEVEL 4 7-11 AGUSTUS 2025">TOT LEVEL 4 7-11 AGUSTUS 2025</option>
                        <option value="AK3U 12 & 19 AGUSTUS 2025">AK3U 12 & 19 AGUSTUS 2025</option>
                        <option value="OPERATOR K3 GENSET 14-15 AGUSTUS 2025">OPERATOR K3 GENSET 14-15 AGUSTUS 2025</option>
                        <option value="PENGAWAS SCAFFOLDING ESDM 15, 18-20 AGUSTUS 2025">PENGAWAS SCAFFOLDING ESDM 15, 18-20 AGUSTUS 2025</option>
                        <option value="JURU LAS CIKARANG 19-22 AGUSTUS 2025">JURU LAS CIKARANG 19-22 AGUSTUS 2025</option>
                        <option value="AUDITOR SMK3 & HIMU 20-22 AGUSTUS 2025">AUDITOR SMK3 & HIMU 20-22 AGUSTUS 2025</option>
                        <option value="TEKNISI K3 LISTRIK 21 & 25 AGUSTUS 2025">TEKNISI K3 LISTRIK 21 & 25 AGUSTUS 2025</option>
                    </select>
                </div>

                <!-- Upload Gambar -->
                <div>
                    <label class="block text-sm font-medium mb-1">Upload Gambar</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full text-sm border rounded-lg file:mr-4 file:py-2 file:px-4
                                  file:rounded-lg file:border-0 file:text-sm file:font-semibold
                                  file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="mt-1 text-xs text-gray-500">Format: JPG/PNG/WebP | Maks: 2MB</p>
                </div>

                <!-- Tombol -->
                <div class="flex justify-end">
                    <button type="submit" 
                            class="px-5 py-2 bg-gradient-to-r from-green-600 to-green-500 text-white rounded-lg shadow hover:scale-105 transition">
                        ✅ Simpan Foto
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
