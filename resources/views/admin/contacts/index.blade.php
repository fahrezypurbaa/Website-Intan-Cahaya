@extends('layouts.admin')

@section('title','Pesan Hubungi Kami')

@section('content')
<div class="p-6">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">📩 Pesan Hubungi Kami</h2>

    <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-100">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-4 py-3 font-semibold text-gray-600">No</th>
                    <th class="px-4 py-3 font-semibold text-gray-600">Nama</th>
                    <th class="px-4 py-3 font-semibold text-gray-600">Email</th>
                    <th class="px-4 py-3 font-semibold text-gray-600">Pesan</th>
                    <th class="px-4 py-3 font-semibold text-gray-600">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($contacts as $index => $contact)
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
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $contacts->links() }}
    </div>
</div>
@endsection
