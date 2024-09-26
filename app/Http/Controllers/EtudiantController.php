<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Http\Requests\StoreEtudiantRequest; // Assurez-vous d'avoir créé ce Request
use App\Http\Requests\UpdateEtudiantRequest; // Assurez-vous d'avoir créé ce Request
use App\Models\Formation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $formations = Formation::all();
        $search = $request->input('search');

        if ($search) {
            $etudiants = Etudiant::where('nom', 'like', '%' . $search . '%')
                        ->orWhere('prenom', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('tel', 'like', '%' . $search . '%')
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

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $etudiant = new Etudiant(); // Créez une nouvelle instance d'Etudiant
        return view('etudiants.create', compact('etudiant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEtudiantRequest $request): RedirectResponse
    {
        // Utilisation de la requête validée
        Etudiant::create($request->validated());

        return redirect()->route('etudiants.index')
                         ->with('success', 'Étudiant créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant): View
    {
        return view('etudiants.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant): View
    {
        return view('etudiants.edit', compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtudiantRequest $request, Etudiant $etudiant): RedirectResponse
    {
        // Utilisation de la requête validée
        $etudiant->update($request->validated());

        return redirect()->route('etudiants.index')
                         ->with('success', 'Étudiant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant): RedirectResponse
    {
        $etudiant->delete();

        return redirect()->route('etudiants.index')
                         ->with('success', 'Étudiant supprimé avec succès.');
    }
}
