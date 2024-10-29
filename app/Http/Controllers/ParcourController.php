<?php

namespace App\Http\Controllers;

use App\Models\Module; 
use Illuminate\Http\Request;
use Illuminate\View\View;

class parcourController extends Controller
{
    // Méthode pour afficher tous les modules avec leurs chapitres
    public function index(): View
    {
        $modules = Module::with('chapitres')->get();
        return view('parcour.modules', compact('modules'));
    }

    // Méthode pour tester la récupération des modules avec leurs chapitres
    public function parcour(): View
    {
        // Récupérer tous les modules avec leurs chapitres associés
        $modules = Module::with('chapitres')->get();
        
        // Retourner la vue avec les modules
        return view('partials.parcour', compact('modules'));
    }


}
