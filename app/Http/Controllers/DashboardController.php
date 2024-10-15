<?php

namespace App\Http\Controllers;

use App\Models\Module; // Assurez-vous d'importer le modèle
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $modules = Module::all(); // Récupération des modules
        return view('components.dashboard', compact('modules'));
    }
}

