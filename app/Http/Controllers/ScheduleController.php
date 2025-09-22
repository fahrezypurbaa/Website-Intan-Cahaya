<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleAdmin;

class ScheduleController extends Controller
{
    // Tampilkan daftar jadwal
public function index()
{
    $schedules = ScheduleAdmin::whereYear('start_date', 2025)
        ->orderBy('start_date', 'asc')
        ->get();

    return view('schedule', compact('schedules'));
}


    // Download PDF
    public function download()
    {
        $filePath = public_path('files/jadwal-2025.pdf');

        if (file_exists($filePath)) {
            return response()->download($filePath, 'jadwal-2025.pdf');
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }
    }
}
