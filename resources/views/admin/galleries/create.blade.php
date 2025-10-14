@extends('layouts.admin')

@section('title', 'Tambah Foto Gallery')

@section('content')
    <x-admin.form-wrapper 
        title="🖼️ Tambah Foto Gallery"
        action="{{ route('admin.galleries.store') }}"
        method="POST"
        enctype="multipart/form-data"
        submit="Simpan Foto Berhasil !"
        back="{{ route('admin.galleries.index') }}"
    >
        {{-- Judul --}}
        <div>
            <label class="block text-sm font-medium mb-1">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full border rounded-lg p-2.5 focus:ring focus:ring-green-200 focus:border-green-400" 
                   placeholder="Masukkan judul foto">
        </div>

        {{-- Kategori --}}
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

        {{-- Upload Gambar --}}
        <div>
            <label class="block text-sm font-medium mb-1">Upload Gambar</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full text-sm border rounded-lg file:mr-4 file:py-2 file:px-4
                          file:rounded-lg file:border-0 file:text-sm file:font-semibold
                          file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <p class="mt-1 text-xs text-gray-500">Format: JPG/PNG/WebP | Maks: 2MB</p>
        </div>
    </x-admin.form-wrapper>
@endsection
