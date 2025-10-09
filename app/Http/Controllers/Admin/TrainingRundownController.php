<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TrainingRundown;
use Illuminate\Http\Request;

class TrainingRundownController extends Controller
{
    public function index()
    {
        $rundowns = TrainingRundown::with('training')
            ->orderBy('day')
            ->paginate(10);
        return view('admin.rundowns.index', compact('rundowns'));
    }

    public function create()
    {
        $trainings = Training::all();
        return view('admin.rundowns.create', compact('trainings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'day' => 'required|integer|min:1',
            'time' => 'required|string|max:255',
            'instructor' => 'nullable|string|max:255',
            // materials dihapus
        ]);

        TrainingRundown::create([
            'training_id' => $request->training_id,
            'day' => $request->day,
            'time' => $request->time,
            'instructor' => $request->instructor,
            'activity' => $request->activity,
        ]);

        return redirect()->route('admin.rundowns.index')->with('success', 'Rundown berhasil ditambahkan');
    }

    public function edit(TrainingRundown $rundown)
    {
        $trainings = Training::all();
        return view('admin.rundowns.edit', compact('rundown', 'trainings'));
    }

    public function update(Request $request, TrainingRundown $rundown)
    {
        $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'day' => 'required|integer|min:1',
            'time' => 'required|string|max:255',
            'instructor' => 'nullable|string|max:255',
        ]);

        $rundown->update([
            'training_id' => $request->training_id,
            'day' => $request->day,
            'time' => $request->time,
            'instructor' => $request->instructor,
        ]);

        return redirect()->route('admin.rundowns.index')->with('success', 'Rundown berhasil diperbarui');
    }

    public function destroy(TrainingRundown $rundown)
    {
        $rundown->delete();
        return redirect()->route('admin.rundowns.index')->with('success', 'Rundown berhasil dihapus');
    }
}