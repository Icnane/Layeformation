<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;
use App\Models\Formation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EtudiantController extends Controller
{
    // Afficher la liste des étudiants
    public function index(Request $request): View
    {
        $search = $request->input('search'); // Recherche si un terme est spécifié

        if ($search) {
            $etudiants = Etudiant::where('nom', 'like', '%' . $search . '%')
                ->orWhere('prenom', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(5);

            $noResults = $etudiants->isEmpty();
        } else {
            $etudiants = Etudiant::orderBy('created_at', 'desc')->paginate(5);
            $noResults = false;
        }

        return view('etudiants.index', compact('etudiants', 'noResults'));
    }

    // Afficher le formulaire de création d'un étudiant
    public function create(): View
    {
        return view('partials.inscription');
    }

    // Stocker un nouvel étudiant
    public function store(StoreEtudiantRequest $request): RedirectResponse
    {
        // Valider les données et préparer les champs requis pour la création
        $validatedData = $request->validated();
    
        // Si le mode de paiement est sélectionné, l'enregistrer
        if ($request->filled('mode_paiement')) {
            $validatedData['mode_paiement'] = $request->input('mode_paiement');
        }
    
        // Créer l'étudiant avec les données validées
        Etudiant::create($validatedData);
    
        // Rediriger vers l'index des étudiants avec un message de succès
        return redirect()->route('etudiants.index')->with('success', 'Étudiant créé avec succès.');
    }
    

    // Afficher un étudiant spécifique
    public function show(Etudiant $etudiant): View
    {
        return view('etudiants.show', compact('etudiant'));
    }

    // Afficher le formulaire d'édition d'un étudiant
    public function edit(Etudiant $etudiant): View
    {
        return view('etudiants.edit', compact('etudiant'));
    }

    // Mettre à jour un étudiant
    public function update(UpdateEtudiantRequest $request, Etudiant $etudiant): RedirectResponse
    {
        $etudiant->update($request->validated());
        return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès.');
    }

    // Supprimer un étudiant
    public function destroy(Etudiant $etudiant): RedirectResponse
    {
        $etudiant->delete();
        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès.');
    }
}
