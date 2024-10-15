<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Http\Requests\DomaineRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Récupérer le terme de recherche
        $search = $request->query('search');

        // Si un terme de recherche est fourni, filtrer les domaines
        if ($search) {
            $domaines = Domaine::where('nom', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $noResults = $domaines->isEmpty(); // Définir la variable $noResults
        } else {
            // Sinon, récupérer tous les domaines
            $domaines = Domaine::paginate(10);
            $noResults = false; // Pas de résultats si aucun filtre n'est appliqué
        }

        // Retourner la vue avec les données
        return view('domaines.index', compact('domaines', 'noResults'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('domaines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DomaineRequest $request): RedirectResponse
    {
        $logoPath = $request->hasFile('logo') ? $request->file('logo')->store('logos', 'public') : null;

        Domaine::create([
            'id' => $request->input('id'),
            'nom' => $request->input('nom'),
            'logo' => $logoPath,
        ]);

        return redirect()->route('domaines.index')->with('success', 'Domaine créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Domaine $domaine): View
    {
        // Charger les formations associées
        $domaine->load('formations');

        return view('domaines.show', compact('domaine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Domaine $domaine): View
    {
        return view('domaines.edit', compact('domaine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DomaineRequest $request, Domaine $domaine): RedirectResponse
    {
        if ($request->hasFile('logo')) {
            $domaine->logo = $request->file('logo')->store('logos', 'public');
        }

        $domaine->nom = $request->input('nom');
        $domaine->save();

        return redirect()->route('domaines.index')->with('success', 'Domaine mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domaine $domaine): RedirectResponse
    {
        $domaine->delete();

        return redirect()->route('domaines.index')->with('success', 'Domaine supprimé avec succès.');
    }

    /**
     * Get all formations associated with a specific domaine.
     */
    public function formations(Domaine $domaine): View
    {
        $formations = $domaine->formations; // Récupérer les formations associées
        return view('domaines.formations', compact('domaine', 'formations'));
    }

    public function showFormations(Domaine $domaine): View
    {
        // Récupérer les formations associées au domaine
        $formations = $domaine->formations; // Assurez-vous que la relation 'formations' est définie dans le modèle Domaine

        return view('domaines.formations', compact('domaine', 'formations'));
    }
}
