<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Module;
use App\Http\Requests\StoreChapitreRequest;
use App\Http\Requests\UpdateChapitreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Quiz;

class ChapitreController extends Controller
{
    // Afficher la liste des chapitres
    public function index(Request $request): View
    {
        $search = $request->input('search'); // Recherche si un terme est spécifié
    
        // Recherche des modules avec leurs chapitres et vidéos, avec un critère de recherche
        $modules = Module::with('chapitres.resources') // Charger les modules avec leurs chapitres et vidéos
            ->when($search, function ($query) use ($search) {
                return $query->where('titre', 'like', '%' . $search . '%')
                    ->orWhereHas('chapitres', function ($chapitreQuery) use ($search) {
                        $chapitreQuery->where('titre', 'like', '%' . $search . '%')
                            ->orWhere('description', 'like', '%' . $search . '%')
                            ->orWhere('id', 'like', '%' . $search . '%');
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5); // Paginer les résultats
        
        // Récupère les chapitres avec leurs relations
        $chapitres = Chapitre::with('module', 'quiz', 'resources')->get();

        // Vérifier si aucun résultat n'a été trouvé
        $noResults = $modules->isEmpty();

        // Passe les variables à la vue
        return view('chapitres.index', compact('modules', 'noResults', 'chapitres'));
    }
    
    // Afficher le formulaire de création d'un chapitre
    public function create(): View
    {
        // Récupérer tous les modules pour les afficher dans le formulaire
        $modules = Module::all();
        $quizzes = Quiz::all();
        return view('chapitres.create', compact('modules', 'quizzes'));
    }

    // Stocker un nouveau chapitre
    public function store(StoreChapitreRequest $request): RedirectResponse
    {
        // Gérer le téléchargement de la vidéo
        $videoPath = $request->hasFile('chemin_video') 
            ? $request->file('chemin_video')->store('videos', 'public') 
            : null;

        // Créer un nouveau chapitre avec les données validées
        Chapitre::create(array_merge($request->validated(), ['chemin_video' => $videoPath]));
        return redirect()->route('chapitres.index')->with('success', 'Chapitre créé avec succès.');
    }

    // Afficher un chapitre spécifique
    public function show(Chapitre $chapitre): View
    {
        // Charger le module associé au chapitre
        $module = $chapitre->module;
        $quizzes = Quiz::all(); // Assurez-vous que la relation 'module' est définie dans le modèle Chapitre
        return view('chapitres.show', compact('chapitre', 'module','quizzes'));
    }

    // Afficher le formulaire d'édition d'un chapitre
    public function edit(Chapitre $chapitre): View
    {
        // Récupérer tous les modules pour les afficher dans le formulaire
        $modules = Module::all();
        $quizzes = Quiz::all();
        return view('chapitres.edit', compact('chapitre', 'modules','quizzes'));
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
        return redirect()->route('chapitres.index')->with('success', 'Chapitre mis à jour avec succès.');
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
        return redirect()->route('chapitres.index')->with('success', 'Chapitre supprimé avec succès.');
    }
}
