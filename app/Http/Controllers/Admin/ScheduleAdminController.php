<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduleAdmin;
use Illuminate\Http\Request;

class ScheduleAdminController extends Controller
{
    public function index()
    {
        $schedules = ScheduleAdmin::orderBy('start_date')->paginate(10);

        return view('admin.scheduleadmin.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.scheduleadmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'nullable|string',
        ]);

        ScheduleAdmin::create($request->only(['title', 'start_date', 'end_date', 'location']));

        return redirect()->route('admin.scheduleadmin.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit(ScheduleAdmin $scheduleadmin)
    {
        return view('admin.scheduleadmin.edit', compact('scheduleadmin'));
    }

    public function update(Request $request, ScheduleAdmin $scheduleadmin)
    {
        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'nullable|string',
        ]);

        $scheduleadmin->update($request->only(['title', 'start_date', 'end_date', 'location']));

        return redirect()->route('admin.scheduleadmin.index')
            ->with('success', 'Jadwal berhasil diupdate');
    }

    public function destroy(ScheduleAdmin $scheduleadmin)
    {
        $scheduleadmin->delete();

        return redirect()->route('admin.scheduleadmin.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
