@extends('layouts.admin')

@section('title', 'Tambah Foto Gallery')

@section('content')
    <div class="max-w-xl">
        <a href="{{ route('admin.galleries.index') }}" class="text-sm text-blue-600 mb-4 inline-block">&larr; Kembali</a>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded mb-4">
                <ul class="text-sm">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Judul</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block text-sm font-medium">Kategori</label>
                <select name="category" class="w-full border rounded p-2">
                    <option value="JURU LAS SURABAYA 4-8 AGUSTUS 2025">JURU LAS SURABAYA 4-8 AGUSTUS 2025</option>
                    <option value="TOT LEVEL 4 7-11 AGUSTUS 2025">TOT LEVEL 4 7-11 AGUSTUS 2025</option>
                    <option value="AK3U 12 & 19 AGUSTUS 2025">AK3U 12 & 19 AGUSTUS 2025</option>
                    <option value="OPERATOR K3 GENSET 14-15 AGUSTUS 2025">OPERATOR K3 GENSET 14-15 AGUSTUS 2025</option>
                    <option value="PENGAWAS SCAFFOLDING ESDM 15, 18-20 AGUSTUS 2025">PENGAWAS SCAFFOLDING ESDM 15, 18-20
                        AGUSTUS 2025</option>
                    <option value="JURU LAS CIKARANG 19-22 AGUSTUS 2025">JURU LAS CIKARANG 19-22 AGUSTUS 2025</option>
                    <option value="AUDITOR SMK3 & HIMU 20-22 AGUSTUS 2025">AUDITOR SMK3 & HIMU 20-22 AGUSTUS 2025</option>
                    <option value="TEKNISI K3 LISTRIK 21 & 25 AGUSTUS 2025">TEKNISI K3 LISTRIK 21 & 25 AGUSTUS 2025</option>

                </select>
            </div>

            <div>
                <label class="block text-sm font-medium">Gambar (jpg/png/webp)</label>
                <input type="file" name="image" accept="image/*" class="w-full">
            </div>

            <div>
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection
