@extends('layouts.admin')

@section('title','Pesan Hubungi Kami')

@section('content')
<div class="p-6">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">📩 Pesan Hubungi Kami</h2>

    <x-admin.table>
        <x-slot name="head">
            <th class="px-4 py-3">No</th>
            <th class="px-4 py-3">Nama</th>
            <th class="px-4 py-3">Email</th>
            <th class="px-4 py-3">Pesan</th>
            <th class="px-4 py-3">Tanggal</th>
        </x-slot>

        @forelse($contacts as $index => $contact)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-4 py-3 text-gray-700">
                    {{ $index + 1 + ($contacts->currentPage() - 1) * $contacts->perPage() }}
                </td>
                <td class="px-4 py-3 font-medium text-gray-800">{{ $contact->nama }}</td>
                <td class="px-4 py-3">
                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">
                        {{ $contact->email }}
                    </span>
                </td>
                <td class="px-4 py-3 text-gray-700">{{ $contact->pesan }}</td>
                <td class="px-4 py-3 text-gray-500">{{ $contact->created_at->format('d M Y H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                    Belum ada pesan masuk.
                </td>
            </tr>
        @endforelse
    </x-admin.table>

    <div class="mt-6">
        {{ $contacts->links() }}
    </div>
</div>
@endsection
