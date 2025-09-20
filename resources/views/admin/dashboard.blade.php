@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Card Training -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-gray-500">Total Training</h2>
        <p class="text-2xl font-bold">{{ $trainingsCount }}</p>
    </div>

    <!-- Card Participant -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-gray-500">Total Participant</h2>
        <p class="text-2xl font-bold">{{ $participantsCount }}</p>
    </div>
</div>
@endsection
