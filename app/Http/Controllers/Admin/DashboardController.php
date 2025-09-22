<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\Category;
use App\Models\Registration; // kalau ada pendaftaran
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $trainingsCount   = Training::count();
        $categoriesCount  = Category::count();
        $registrationsCount = class_exists(Registration::class) ? Registration::count() : 0;

        return view('admin.dashboard', compact(
            'trainingsCount',
            'categoriesCount',
            'registrationsCount'
        ));
    }
}
