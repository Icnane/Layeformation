<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Module;
use App\Http\Requests\StoreChapitreRequest;
use App\Http\Requests\UpdateChapitreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage; // Assurez-vous d'importer cette classe

class ChapitreController extends Controller
{
    // Afficher le formulaire de création d'un chapitre
    public function create(): View
    {
        // Récupérer tous les modules pour les afficher dans le formulaire
        $modules = Module::all();
        return view('chapitres.create', compact('modules'));
    }

    // Stocker un nouveau chapitre
    public function store(StoreChapitreRequest $request): RedirectResponse
    {
        // Gérer le téléchargement de la vidéo
        $videoPath = null;
        if ($request->hasFile('chemin_video')) {
            $videoPath = $request->file('chemin_video')->store('videos', 'public'); // Enregistre la vidéo dans le dossier public/videos
        }

        // Créer un nouveau chapitre avec les données validées
        Chapitre::create(array_merge($request->validated(), ['chemin_video' => $videoPath]));
        return redirect()->route('chapitres.inde')->with('success', 'Chapitre créé avec succès.');
    }

    // Afficher un chapitre spécifique
    public function show(Chapitre $chapitre): View
    {
        return view('chapitres.show', compact('chapitre'));
    }

    // Afficher le formulaire d'édition d'un chapitre
    public function edit(Chapitre $chapitre): View
    {
        // Récupérer tous les modules pour les afficher dans le formulaire
        $modules = Module::all();
        return view('chapitres.edit', compact('chapitre', 'modules'));
    }

    // Mettre à jour un chapitre
    public function update(UpdateChapitreRequest $request, Chapitre $chapitre): RedirectResponse
    {
        // Gérer le téléchargement de la vidéo si une nouvelle vidéo est fournie
        if ($request->hasFile('chemin_video')) {
            // Supprimer l'ancienne vidéo si elle existe
            if ($chapitre->chemin_video) {
                Storage::disk('public')->delete($chapitre->chemin_video);
            }
            $videoPath = $request->file('chemin_video')->store('videos', 'public'); // Enregistre la nouvelle vidéo
            $chapitre->chemin_video = $videoPath; // Met à jour le chemin de la vidéo
        }

        // Mettre à jour les autres champs du chapitre
        $chapitre->update($request->validated());
        return redirect()->route('chapitres.inde')->with('success', 'Chapitre mis à jour avec succès.');
    }

    // Supprimer un chapitre
    public function destroy(Chapitre $chapitre): RedirectResponse
    {
        // Supprimer la vidéo si elle existe
        if ($chapitre->chemin_video) {
            Storage::disk('public')->delete($chapitre->chemin_video);
        }

        // Supprimer le chapitre
        $chapitre->delete();
        return redirect()->route('chapitres.inde')->with('success', 'Chapitre supprimé avec succès.');
    }

    // Ajoutez ceci dans votre ChapitreController

    public function index(): View
    {
        // Récupérer tous les chapitres avec pagination
        $chapitres = Chapitre::paginate(10); // Vous pouvez ajuster le nombre de chapitres par page
        return view('chapitres.index', compact('chapitres')); // Ajustement du chemin
    }
    


}
