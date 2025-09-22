@extends('layouts.admin')

@section('title','Pesan Hubungi Kami')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Pesan Hubungi Kami</h2>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full text-sm text-left border border-gray-200 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Pesan</th>
                    <th class="px-4 py-3">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($contacts as $index => $contact)
                    <tr>
                        <td class="px-4 py-3">{{ $index + 1 + ($contacts->currentPage() - 1) * $contacts->perPage() }}</td>
                        <td class="px-4 py-3">{{ $contact->nama }}</td>
                        <td class="px-4 py-3">{{ $contact->email }}</td>
                        <td class="px-4 py-3">{{ $contact->pesan }}</td>
                        <td class="px-4 py-3">{{ $contact->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $contacts->links() }}
    </div>
</div>
@endsection
