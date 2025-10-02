<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|unique:registrations,email',
            'phone'            => 'required|string|max:20',
            'participant_type' => 'required|in:personal,company',
            'company_name'     => 'nullable|string|max:255',
            'position'         => 'nullable|string|max:255',
        ]);

        Registration::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'participant_type' => $request->participant_type,
            'company_name'     => $request->participant_type === 'company' ? $request->company_name : null,
            'position'         => $request->participant_type === 'company' ? $request->position : null,
        ]);

        return redirect()->route('registration.success');
    }

    public function success()
    {
        $adminWa = '6281234567890'; // nomor admin utama

        return view('registration.success', compact('adminWa'));
    }
}
