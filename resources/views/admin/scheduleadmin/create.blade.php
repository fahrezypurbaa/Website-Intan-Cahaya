@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Tambah Jadwal</h2>

    <form action="{{ route('admin.scheduleadmin.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block">Nama Pelatihan</label>
            <input type="text" name="title" class="w-full border px-3 py-2" required>
        </div>
        <div>
            <label class="block">Tanggal Mulai</label>
            <input type="date" name="start_date" class="w-full border px-3 py-2" required>
        </div>
        <div>
            <label class="block">Tanggal Selesai</label>
            <input type="date" name="end_date" class="w-full border px-3 py-2" required>
        </div>
        <div>
            <label class="block">Lokasi</label>
            <input type="text" name="location" class="w-full border px-3 py-2">
        </div>
       <button type="submit" 
    class="px-4 py-2 bg-green-600 text-white rounded 
           hover:bg-green-700 focus:outline-none 
           focus:ring-2 focus:ring-green-500 focus:ring-offset-1 opacity-100">
    Simpan
</button>
    </form>
</div>
@endsection
