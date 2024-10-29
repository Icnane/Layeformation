<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Formation;
use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleController extends Controller
{
    /**
     * Affiche la liste des modules avec recherche et pagination.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search'); // Recherche si un terme est spécifié

        $modules = Module::with('formation')
            ->when($search, function ($query, $search) {
                return $query->where('titre', 'like', '%' . $search . '%')
                             ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $noResults = $modules->isEmpty(); // True si aucun module n'a été trouvé

        return view('modules.index', compact('modules', 'search', 'noResults'));
    }

    /**
     * Récupère tous les modules avec leurs chapitres pour la page Parcour.
     */
    public function parcour(): View
    {
        // Récupérer tous les modules avec leurs chapitres associés
        $modules = Module::with('chapitres')->get();

        // Retourner la vue avec les modules
        return view('partials.parcour', compact('modules'));
    }

    /**
     * Affiche les chapitres d'un module spécifique au format JSON.
     */
    public function showChapters(Module $module)
    {
        return response()->json(['chapitres' => $module->chapitres]);
    }

    /**
     * Affiche le formulaire de création d'un module.
     */
    public function create(): View
    {
        $formations = Formation::all();
        return view('modules.create', compact('formations'));
    }

    /**
     * Affiche les cours avec leurs chapitres et quiz.
     */
    public function mescours(): View
    {
        // Récupérez tous les modules avec leurs chapitres
        $modules = Module::with('chapitres')->get(); // Assurez-vous d'avoir défini la relation dans le modèle

        // Retournez la vue avec les modules
        return view('mescours', compact('modules'));
    }

    /**
     * Stocke un nouveau module dans la base de données.
     */
    public function store(StoreModuleRequest $request): RedirectResponse
{
    // Ajout d'une validation explicite pour le titre
    $validatedData = $request->validated();

    // Assurez-vous que le titre est présent dans les données validées
    Module::create($validatedData);
    
    return redirect()->route('modules.index')->with('success', 'Module créé avec succès.');
}


    /**
     * Affiche un module spécifique.
     */
    public function show(Module $module): View
    {
        return view('modules.show', compact('module'));
    }

    /**
     * Affiche le formulaire d'édition d'un module.
     */
    public function edit(Module $module): View
    {
        $formations = Formation::all();
        return view('modules.edit', compact('module', 'formations'));
    }

    /**
     * Met à jour un module dans la base de données.
     */
    public function update(UpdateModuleRequest $request, Module $module): RedirectResponse
    {
        $module->update($request->validated());
        return redirect()->route('modules.index')->with('success', 'Module mis à jour avec succès.');
    }

    /**
     * Supprime un module de la base de données.
     */
    public function destroy(Module $module): RedirectResponse
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Module supprimé avec succès.');
    }

    /**
     * Teste la relation entre les modules et les chapitres en affichant leurs titres.
     */
    public function testRelation()
    {
        $modules = Module::with('chapitres')->get();
        foreach ($modules as $module) {
            echo "Module: " . $module->titre . "<br>";
            foreach ($module->chapitres as $chapitre) {
                echo "Chapitre: " . $chapitre->titre . "<br>";
            }
        }
    }
}
