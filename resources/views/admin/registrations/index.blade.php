@extends('layouts.admin')

@section('title', 'Daftar Registrasi')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">📋 Daftar Peserta Registrasi</h2>
        </div>

        <x-admin.table>
            <x-slot name="head">
                <th class="px-4 py-3">No</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">No HP</th>
                <th class="px-4 py-3">Tipe Peserta</th>
                <th class="px-4 py-3">Perusahaan</th>
                <th class="px-4 py-3">Jabatan</th>
                <th class="px-4 py-3">Nama Pelatihan</th>
                <th class="px-4 py-3">Jenis Pelatihan</th>
                <th class="px-4 py-3">Tanggal Daftar</th>
                <th class="px-4 py-3">Waktu Daftar</th>
            </x-slot>

            @forelse($registrations as $index => $reg)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 text-gray-700">
                        {{ $index + 1 + ($registrations->currentPage() - 1) * $registrations->perPage() }}
                    </td>
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $reg->name }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">
                            {{ $reg->email ?? '-' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-gray-700">{{ $reg->phone }}</td>
                    <td class="px-4 py-3">
                        <span
                            class="px-2 py-1 rounded-md text-xs font-medium
                        {{ $reg->participant_type === 'company' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ ucfirst($reg->participant_type ?? '-') }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-gray-700">
                        {{ $reg->training->title ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-gray-700">
                        {{ $reg->training->category->name ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-gray-700">{{ $reg->company_name ?? '-' }}</td>
                    <td class="px-4 py-3 text-gray-700">{{ $reg->position ?? '-' }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $reg->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-3 text-gray-500 text-sm">
                        {{ $reg->created_at->format('H:i') }} ({{ $reg->created_at->diffForHumans() }})
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="px-4 py-6 text-center text-gray-500">
                        Belum ada peserta registrasi.
                    </td>
                </tr>
            @endforelse
        </x-admin.table>

        <div class="mt-6">
            {{ $registrations->links() }}
        </div>
    </div>
@endsection
