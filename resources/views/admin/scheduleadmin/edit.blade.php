@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Jadwal</h2>

    <form action="{{ route('admin.scheduleadmin.update', $scheduleadmin) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block">Nama Pelatihan</label>
            <input type="text" name="title" value="{{ $scheduleadmin->title }}" class="w-full border px-3 py-2" required>
        </div>
        <div>
            <label class="block">Tanggal Mulai</label>
            <input type="date" name="start_date" value="{{ $scheduleadmin->start_date }}" class="w-full border px-3 py-2" required>
        </div>
        <div>
            <label class="block">Tanggal Selesai</label>
            <input type="date" name="end_date" value="{{ $scheduleadmin->end_date }}" class="w-full border px-3 py-2" required>
        </div>
        <div>
            <label class="block">Lokasi</label>
            <input type="text" name="location" value="{{ $scheduleadmin->location }}" class="w-full border px-3 py-2">
        </div>
        <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded">Update</button>
    </form>
</div>
@endsection
