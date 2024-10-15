<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Formation; // Assurez-vous d'importer le modèle Formation
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all(); // Récupération de tous les modules
        return view('domaines.modules.index', compact('modules')); // Correction du nom de la vue
    }

    public function modules()
    {
        $modules = Module::all(); // Récupérer les modules
        return view('partials.modules', compact('modules'));
    }

    public function create()
    {
        $formations = Formation::all(); // Récupérer toutes les formations
        return view('domaines.modules.create', compact('formations')); // Passer les formations à la vue
    }

    public function getFormations()
    {
        $formations = Formation::all(); // Récupérer toutes les formations
        return response()->json($formations); // Retourner les formations en JSON
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url',
            'formation_id' => 'required|exists:formations,id',
        ]);

        // Vérifiez les données reçues
        dd($request->all());

        Module::create([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
            'formation_id' => $request->formation_id,
        ]);

        return redirect()->route('modules.index')->with('success', 'Module créé avec succès.');
    }

    public function edit(Module $module)
    {
        return view('domaines.modules.edit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url',
            'formation_id' => 'required|exists:formations,id',
        ]);

        $module->update([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
            'formation_id' => $request->formation_id,
        ]);

        return redirect()->route('modules.index')->with('success', 'Module mis à jour avec succès.');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Module supprimé avec succès.');
    }
}
