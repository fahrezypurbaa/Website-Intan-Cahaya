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
            <th class="px-4 py-3 text-center">Aksi</th>
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
                <td class="px-4 py-3 text-gray-700">{{ Str::limit($contact->pesan, 50) }}</td>
                <td class="px-4 py-3 text-gray-500">{{ $contact->created_at->format('d M Y H:i') }}</td>
                <td class="px-4 py-3 text-center">
                    <div class="flex justify-center gap-2">
                        <!-- Detail -->
                        <a href="{{ route('admin.contacts.show', $contact->id) }}"
                           class="px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium rounded shadow-sm transition">
                            🔍 Detail
                        </a>
                        <!-- Hapus -->
                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                              onsubmit="return confirm('Hapus pesan ini?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded shadow-sm transition">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-4 py-6 text-center text-gray-500">
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
