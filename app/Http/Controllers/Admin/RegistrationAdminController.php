<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RegistrationsExport;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use Maatwebsite\Excel\Facades\Excel;

class RegistrationAdminController extends Controller
{
    public function index()
    {
        $registrations = Registration::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.registrations.index', compact('registrations'));
    }

    public function export()
    {
        $filename = 'registrations_'.now()->format('Y-m-d_H-i-s').'.xlsx';

        return Excel::download(new RegistrationsExport, $filename);
    }
}
