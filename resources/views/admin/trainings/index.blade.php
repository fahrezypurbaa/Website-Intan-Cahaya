@extends('layouts.admin')

@section('title','Kelola Training')

@section('content')
<a href="{{ route('admin.trainings.create') }}" 
   class="px-4 py-2 bg-[#73BA7D] text-white rounded mb-4 inline-block">+ Tambah Training</a>

<table class="min-w-full text-sm text-left border border-gray-200 rounded-lg">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-4 py-2">Nama Pelatihan</th>
            <th class="px-4 py-2">Jenis Pelatihan</th>
            <th class="px-4 py-2">Pelaksanaan Pelatihan</th>
            <th class="px-4 py-2">CRUD</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
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