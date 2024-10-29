<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Module;
use App\Models\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    // Afficher la liste des ressources
    public function index()
    {
        $modules = Module::with('chapitres')->get(); // Récupérer les modules avec leurs chapitres
        return view('resources.index', compact('modules')); // Passer les modules à la vue
    }

    // Afficher le formulaire de création d'une nouvelle ressource
    public function create()
    {
        $modules = Module::all(); // Récupérer tous les modules
        $chapitres = Chapitre::all(); // Récupérer tous les chapitres
        return view('resources.create', compact('modules', 'chapitres')); // Passer les modules et chapitres à la vue
    }

    // Stocker une nouvelle ressource
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'text_content' => 'nullable|string',
            'video' => 'nullable|file|mimes:mp4,avi,mov|max:20480',
            'module_id' => 'required|exists:modules,id',
            'chapitre_id' => 'required|exists:chapitres,id',
        ]);

        $resource = new Resource();
        $resource->title = $request->title;
        $resource->text_content = $request->text_content;

        if ($request->hasFile('video')) {
            $resource->video_path = $request->file('video')->store('videos', 'public');
        }

        $resource->module_id = $request->module_id;
        $resource->chapitre_id = $request->chapitre_id;
        $resource->save();

        return redirect()->route('resources.index')->with('success', 'Ressource créée avec succès.');
    }

    // Afficher une ressource spécifique
    public function show(Resource $resource)
    {
        return view('resources.show', compact('resource'));
    }

    // Afficher le formulaire d'édition d'une ressource
    public function edit(Resource $resource)
    {
        $modules = Module::all();
        $chapitres = Chapitre::all();
        return view('resources.edit', compact('resource', 'modules', 'chapitres'));
    }

    // Mettre à jour une ressource existante
    public function update(Request $request, Resource $resource)
    {
        $request->validate([
            'title' => 'nullable|string',
            'text_content' => 'nullable|string',
            'video' => 'nullable|file|mimes:mp4,avi,mov|max:20480',
            'module_id' => 'required|exists:modules,id',
            'chapitre_id' => 'required|exists:chapitres,id',
        ]);

        $resource->title = $request->title;
        $resource->text_content = $request->text_content;

        if ($request->hasFile('video')) {
            // Supprimer l'ancienne vidéo si une nouvelle est téléversée
            if ($resource->video_path) {
                Storage::disk('public')->delete($resource->video_path);
            }
            $resource->video_path = $request->file('video')->store('videos', 'public');
        }

        $resource->module_id = $request->module_id;
        $resource->chapitre_id = $request->chapitre_id;
        $resource->save();

        return redirect()->route('resources.index')->with('success', 'Ressource mise à jour avec succès.');
    }

    // Supprimer une ressource
    public function destroy(Resource $resource)
    {
        // Supprimer la vidéo associée si elle existe
        if ($resource->video_path) {
            Storage::disk('public')->delete($resource->video_path);
        }

        $resource->delete();
        return redirect()->route('resources.index')->with('success', 'Ressource supprimée avec succès.');
    }
}
