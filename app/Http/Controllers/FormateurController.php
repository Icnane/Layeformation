<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use App\Http\Requests\StoreFormateurRequest;
use App\Http\Requests\UpdateFormateurRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');

        if ($search) {
            $formateurs = Formateur::where('nom', 'like', '%' . $search . '%')
                        ->orWhere('prenom', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('contact', 'like', '%' . $search . '%')
                        ->orWhere('id', 'like', '%' . $search . '%')
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);

            $noResults = $formateurs->isEmpty();
        } else {
            $formateurs = Formateur::orderBy('created_at', 'desc')->paginate(5);
            $noResults = false;
        }

        return view('formateurs.index', compact('formateurs', 'noResults'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $formateur = new Formateur(); // Créez une nouvelle instance de Formateur
        return view('formateurs.create', compact('formateur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormateurRequest $request): RedirectResponse
    {
        // Utilisation de la requête validée
        Formateur::create($request->validated());

        return redirect()->route('formateurs.index')
                         ->with('success', 'Formateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formateur $formateur): View
    {
        return view('formateurs.show', compact('formateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formateur $formateur): View
    {
        return view('formateurs.edit', compact('formateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormateurRequest $request, Formateur $formateur): RedirectResponse
    {
        // Utilisation de la requête validée
        $formateur->update($request->validated());

        return redirect()->route('formateurs.index')
                        ->with('success', 'Formateur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formateur $formateur): RedirectResponse
    {
        $formateur->delete();

        return redirect()->route('formateurs.index')
                        ->with('success', 'Formateur supprimé avec succès.');
    }
}
