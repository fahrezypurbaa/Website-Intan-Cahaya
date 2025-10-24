<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;

class RegistrationAdminController extends Controller
{
    public function index()
    {
        // ambil semua data registrasi tanpa jadwal
        $registrations = Registration::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.registrations.index', compact('registrations'));
    }
}
