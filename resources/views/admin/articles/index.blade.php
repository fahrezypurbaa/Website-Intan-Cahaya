@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Artikel</h1>
        <a href="{{ route('admin.articles.create') }}" class="px-4 py-2 bg-[#73BA7D] text-white rounded">+ Tambah Artikel</a>
    </div>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Judul</th>
                <th class="px-4 py-2 border">Tanggal</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td class="px-4 py-2 border">{{ $article->title }}</td>
                    <td class="px-4 py-2 border">{{ $article->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-2 border flex gap-2">
                        <a href="{{ route('admin.articles.edit', $article) }}"
                            class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                            onsubmit="return confirm('Yakin?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-2 py-1 bg-red-600 text-white rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $articles->links() }}
    </div>
@endsection
