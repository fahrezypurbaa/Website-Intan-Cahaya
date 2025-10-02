@extends('layouts.admin')

@section('title','Daftar Registrasi')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Peserta Registrasi</h2>

    <x-admin.table>
        <x-slot name="head">
            <th class="px-4 py-3">No</th>
            <th class="px-4 py-3">Nama</th>
            <th class="px-4 py-3">Email</th>
            <th class="px-4 py-3">No HP</th>
            <th class="px-4 py-3">Tanggal Daftar</th>
            <th class="px-4 py-3">Waktu Daftar</th>
        </x-slot>

        @forelse($registrations as $index => $reg)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">
                    {{ $index + 1 + ($registrations->currentPage() - 1) * $registrations->perPage() }}
                </td>
                <td class="px-4 py-3 font-medium text-gray-800">{{ $reg->name }}</td>
                <td class="px-4 py-3">{{ $reg->email ?? '-' }}</td>
                <td class="px-4 py-3">{{ $reg->phone }}</td>
                <td class="px-4 py-3">{{ $reg->created_at->format('d M Y H:i') }}</td>
                <td class="px-4 py-3 text-gray-500 text-sm">{{ $reg->created_at->diffForHumans() }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                    Belum ada peserta registrasi.
                </td>
            </tr>
        @endforelse
    </x-admin.table>

    <div class="mt-4">
        {{ $registrations->links() }}
    </div>
</div>
@endsection
