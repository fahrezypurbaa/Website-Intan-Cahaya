@extends('layouts.admin')

@section('title','Kelola Training')

@section('content')
<a href="{{ route('admin.trainings.create') }}" 
   class="px-4 py-2 bg-green-600 text-white rounded mb-4 inline-block">+ Tambah Training</a>

<table class="w-full bg-white shadow rounded-lg overflow-hidden">
    <thead class="bg-green-600 text-white">
        <tr>
            <th class="px-4 py-2">Judul</th>
            <th class="px-4 py-2">Kategori</th>
            <th class="px-4 py-2">Mode</th>
            <th class="px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trainings as $t)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $t->title }}</td>
            <td class="px-4 py-2">{{ $t->category->name }}</td>
            <td class="px-4 py-2">{{ $t->mode }}</td>
            <td class="px-4 py-2">
                <a href="{{ route('admin.trainings.edit',$t) }}" class="text-blue-600">Edit</a> |
                <form action="{{ route('admin.trainings.destroy',$t) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')" class="text-red-600">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $trainings->links() }}
</div>
@endsection
