<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module; 

class mescoursController extends Controller 
{
    // Afficher tous les modules avec leurs chapitres et vidéos
    public function index()
    {
        // Récupérer tous les modules avec leurs chapitres et vidéos
        $modules = Module::with(['chapitres:id,titre,description,chemin_video,module_id'])->get();
        {
            $modules = Module::with('chapitres')->get(); // Assurez-vous que la relation 'chapitres' est correctement définie dans le modèle Module
            return view('partials.mescours', compact('modules'));
        }
        // Vérifier s'il y a des modules
        if ($modules->isEmpty()) {
            return view('partials.mescours', ['modules' => [], 'message' => 'Aucun module trouvé.']);
        }
    
       

        
    }
    
}
