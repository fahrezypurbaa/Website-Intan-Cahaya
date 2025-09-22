@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Peserta</h2>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full text-sm text-left border border-gray-200 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">No HP</th>
                    <th class="px-4 py-3">Tanggal Daftar</th>
                    <th class="px-4 py-3">Waktu Daftar</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($registrations as $index => $reg)
                    <tr>
                        <td class="px-4 py-3">{{ $index + 1 + ($registrations->currentPage() - 1) * $registrations->perPage() }}</td>
                        <td class="px-4 py-3">{{ $reg->name }}</td>
                        <td class="px-4 py-3">{{ $reg->email ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $reg->phone }}</td>
                        <td class="px-4 py-3">{{ $reg->created_at->format('d M Y H:i') }}</td>
                        <td class="px-4 py-3">{{ $reg->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $registrations->links() }}
    </div>
</div>
@endsection
