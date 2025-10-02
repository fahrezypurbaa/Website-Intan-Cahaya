@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Rundown Training</h1>

    <form action="{{ route('admin.rundowns.update', $rundown->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Training</label>
            <select name="training_id" class="w-full border rounded p-2" required>
                @foreach($trainings as $training)
                    <option value="{{ $training->id }}" 
                        {{ $rundown->training_id == $training->id ? 'selected' : '' }}>
                        {{ $training->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium">Hari ke-</label>
            <input type="number" name="day" class="w-full border rounded p-2" 
                   value="{{ old('day', $rundown->day) }}" min="1" required>
        </div>

        <div>
            <label class="block font-medium">Waktu</label>
            <input type="text" name="time" class="w-full border rounded p-2" 
                   value="{{ old('time', $rundown->time) }}" required>
        </div>

        <div>
            <label class="block font-medium">Instruktur</label>
            <input type="text" name="instructor" class="w-full border rounded p-2" 
                   value="{{ old('instructor', $rundown->instructor) }}">
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update</button>
            <a href="{{ route('admin.rundowns.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Batal</a>
        </div>
    </form>
</div>
@endsection