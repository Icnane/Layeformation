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
    public function index()
{
    $modules = Module::all(); // Ou votre logique pour récupérer les modules
    return view('components.dashboard', compact('modules'));
}
}


