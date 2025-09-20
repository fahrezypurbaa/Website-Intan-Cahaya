<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;     // ✅ ini model
use App\Models\Participant;

class DashboardController extends Controller
{
     public function index()
    {
         // hitung jumlah data
        $trainingsCount = Training::count();
        $participantsCount = Participant::count();

        // kirim ke view
        return view('admin.dashboard', compact('trainingsCount', 'participantsCount'));
    }
}
