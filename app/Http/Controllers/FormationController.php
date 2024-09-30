<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $formations = Formation::when($search, function ($query) use ($search) {
            $query->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('promo', 'like', '%' . $search . '%')
                  ->orWhere('id', 'like', '%' . $search . '%')
                  ->orWhere('cout', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'desc')
          ->paginate(5);

        return view('formations.index', [
            'formations' => $formations,
            'noResults' => $formations->isEmpty()
        ]);
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
        $validatedData = $request->validate([
            'id' => 'required|integer|unique:formations,id',
            'promo' => 'nullable|string|max:255',
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'cout' => 'required|integer|min:0',
            'heures_par_semaine' => 'required|integer|min:1',
            'domaine_id' => 'required|integer|exists:domaines,id', // Ajout de la validation pour domaine_id
        ]);

        Formation::create($validatedData);

        return redirect()->route('formations.index')
                         ->with('success', 'Formation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation): View
    {
        $domaine = $formation->domaine; // Récupération du domaine associé
        return view('formations.show', compact('formation', 'domaine'));
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
        $validatedData = $request->validate([
            'id' => 'required|integer|unique:formations,id,' . $formation->id,
            'promo' => 'nullable|string|max:255',
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'cout' => 'required|integer|min:0',
            'heures_par_semaine' => 'required|integer|min:1',
            'domaine_id' => 'required|integer|exists:domaines,id', // Ajout de la validation pour domaine_id
        ]);

        $formation->update($validatedData);

        return redirect()->route('formations.index')
                        ->with('success', 'Formation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation): RedirectResponse
    {
        $formation->delete();

        return redirect()->route('formations.index')
                        ->with('success', 'Formation supprimée avec succès.');
    }
}
