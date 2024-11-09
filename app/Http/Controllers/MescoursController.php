<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

class MescoursController extends Controller
{
    // Afficher tous les modules avec leurs chapitres, vidéos et quiz (avec pagination)
    public function index()
    {
        // Récupérer les modules avec leurs chapitres, vidéos et quiz associés, en utilisant la pagination
        $modules = Module::with(['chapitres' => function($query) {
            $query->select('id', 'titre', 'description', 'chemin_video', 'module_id') // Sélectionner les colonnes nécessaires pour les chapitres
                  ->with('quiz'); // Inclure les quiz associés à chaque chapitre
        }])->paginate(10); // 10 modules par page

        // Vérifier s'il y a des modules
        if ($modules->isEmpty()) {
            return view('partials.mescours', ['modules' => [], 'message' => 'Aucun module trouvé.']);
        }

        // Retourner la vue avec les modules paginés
        return view('partials.mescours', compact('modules'));
    }
}
