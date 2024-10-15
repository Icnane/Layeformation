<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Formation;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FormationController extends Controller
{
    // Afficher la liste des formations
    public function index(Request $request): View
    {
        // Récupérer les formations avec pagination
        $formations = Formation::with('domaine')->paginate(10); // 10 par page
        $noResults = $formations->isEmpty(); // Vérifie si la collection est vide
        $modules = Module::all();
        return view('formations.index', compact('formations','modules', 'noResults'));
    }

    // Afficher le formulaire de création de formation
    public function create(): View
    {
        $domaines = Domaine::all(); // Récupérer tous les domaines
        return view('formations.create', compact('domaines'));
    }

    // Stocker une nouvelle formation
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'promo' => 'nullable|string|max:255',
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'cout' => 'required|integer|min:0',
            'heures_par_semaine' => 'required|integer|min:1',
            'domaine_id' => 'nullable|integer|exists:domaines,id',
        ]);

        Formation::create($validatedData);

        return redirect()->route('formations.index')
                         ->with('success', 'Formation créée avec succès.');
    }

    // Afficher le formulaire d'édition de formation
    public function edit(Formation $formation): View
    {
        $domaines = Domaine::all(); // Récupérer tous les domaines
        return view('formations.edit', compact('formation', 'domaines'));
    }

    // Mettre à jour une formation existante
    public function update(Request $request, Formation $formation): RedirectResponse
    {
        $validatedData = $request->validate([
            'promo' => 'nullable|string|max:255',
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'cout' => 'required|integer|min:0',
            'heures_par_semaine' => 'required|integer|min:1',
            'domaine_id' => 'required|integer|exists:domaines,id',
        ]);

        $formation->update($validatedData);

        return redirect()->route('formations.index')
                        ->with('success', 'Formation mise à jour avec succès.');
    }

    // Supprimer une formation
    public function destroy(Formation $formation): RedirectResponse
    {
        $formation->delete();

        return redirect()->route('formations.index')
                         ->with('success', 'Formation supprimée avec succès.');
    }

    // Afficher les détails d'une formation
    public function show(Formation $formation): View
    {
        return view('formations.show', compact('formation'));
    }
}
