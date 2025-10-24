@extends('layouts.admin')

@section('title', 'Daftar Registrasi')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">📋 Daftar Peserta Registrasi</h2>

            <a href="{{ route('admin.registrations.export') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                </svg>
                Export CSV
            </a>
        </div>

        {{-- Tambahkan wadah scroll responsif --}}
        <div class="overflow-x-auto bg-white rounded-xl shadow border border-gray-100">
            <x-admin.table class="min-w-max w-full text-sm text-gray-700">
                <x-slot name="head">
                    <tr class="bg-gray-50 text-gray-700 text-xs uppercase font-semibold tracking-wider">
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">No HP</th>
                        <th class="px-4 py-3 text-left">Tipe Peserta</th>
                        <th class="px-4 py-3 text-left">Nama Perusahaan</th>
                        <th class="px-4 py-3 text-left">Jabatan</th>
                        <th class="px-4 py-3 text-left">Kota</th>
                        <th class="px-4 py-3 text-left">Nama Pelatihan</th>
                        <th class="px-4 py-3 text-left">Jenis Pelatihan</th>
                        <th class="px-4 py-3 text-left">Tanggal Daftar</th>
                        <th class="px-4 py-3 text-left">Waktu Daftar</th>
                    </tr>
                </x-slot>

                @forelse($registrations as $index => $reg)
                    <tr class="border-t hover:bg-gray-50 transition">
                        <td class="px-4 py-3 text-gray-700">
                            {{ $index + 1 + ($registrations->currentPage() - 1) * $registrations->perPage() }}
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $reg->name }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium break-words">
                                {{ $reg->email ?? '-' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-700">{{ $reg->phone ?? '-' }}</td>

                        <td class="px-4 py-3">
                            <span
                                class="px-2 py-1 rounded-md text-xs font-medium
                            {{ $reg->participant_type === 'company' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ ucfirst($reg->participant_type ?? '-') }}
                            </span>
                        </td>

                        <td class="px-4 py-3 text-gray-700 truncate max-w-[180px]">{{ $reg->company_name ?? '-' }}</td>
                        <td class="px-4 py-3 text-gray-700 truncate max-w-[150px]">{{ $reg->position ?? '-' }}</td>

                        {{-- Kota sesuai tipe peserta --}}
                        <td class="px-4 py-3 text-gray-700">
                            {{ $reg->participant_type === 'company' ? $reg->company_city ?? '-' : $reg->personal_city ?? '-' }}
                        </td>

                        <td class="px-4 py-3 text-gray-700 truncate max-w-[200px]">{{ $reg->training->title ?? '-' }}</td>
                        <td class="px-4 py-3 text-gray-700 truncate max-w-[180px]">
                            {{ $reg->training->category->name ?? '-' }}</td>

                        <td class="px-4 py-3 text-gray-600 whitespace-nowrap">{{ $reg->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-3 text-gray-500 text-sm whitespace-nowrap">
                            {{ $reg->created_at->format('H:i') }} ({{ $reg->created_at->diffForHumans() }})
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="px-4 py-6 text-center text-gray-500">
                            Belum ada peserta registrasi.
                        </td>
                    </tr>
                @endforelse
            </x-admin.table>
        </div>

        {{-- Pagination di bawah tabel --}}
        <div class="mt-6 flex justify-center">
            {{ $registrations->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
