<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Récupération du paramètre de recherche
    $search = $request->input('search');

    // Vérifiez si une recherche est effectuée
    if ($search) {
        // Rechercher des formations basées sur le critère de recherche
        $formations = Formation::where('nom', 'like', '%' . $search . '%')
                        ->orWhere('promo', 'like', '%' . $search . '%')
                        ->orWhere('id', 'like', '%' . $search . '%')
                        ->orWhere('cout', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);

        // Définir la variable $noResults en fonction des résultats
        $noResults = $formations->isEmpty();
    } else {
        // Si aucune recherche n'est effectuée, récupérer toutes les formations
        $formations = Formation::orderBy('created_at', 'desc')->paginate(5);
        $noResults = false;
    }

    // Passer la variable à la vue
    return view('formations.index', compact('formations', 'noResults'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('formations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation des données
        $validatedData = $request->validate([
            'id' => 'required|integer|unique:formations,id',
            'promo' => 'nullable|string|max:255',
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'cout' => 'required|integer|min:0',
            'heures_par_semaine' => 'required|integer|min:1',
        ]);

        // Création de la formation
        Formation::create($validatedData);

        return redirect()->route('formations.index')
                         ->with('success', 'Formation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation): View
    {
        return view('formations.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation): View
    {
        return view('formations.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formation $formation): RedirectResponse
    {
        // Validation des données pour la mise à jour
        $validatedData = $request->validate([
            'id' => 'required|integer|unique:formations,id,' . $formation->id,
            'promo' => 'nullable|string|max:255',
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'cout' => 'required|integer|min:0',
            'heures_par_semaine' => 'required|integer|min:1',
        ]);

        // Mise à jour de la formation
        $formation->update($validatedData);

        return redirect()->route('formations.index')
                        ->with('success', 'Formation mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation): RedirectResponse
    {
        $formation->delete();

        return redirect()->route('formations.index')
                        ->with('success', 'Formation supprimée avec succès');
    }
}
