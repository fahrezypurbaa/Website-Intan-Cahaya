<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Registration;
use App\Models\Training; // kalau ada pendaftaran

class DashboardController extends Controller
{
    public function index()
    {
        $trainingsCount = Training::count();
        $categoriesCount = Category::count();
        $registrationsCount = class_exists(Registration::class) ? Registration::count() : 0;

        return view('admin.dashboard', compact(
            'trainingsCount',
            'categoriesCount',
            'registrationsCount'
        ));
    }
}
