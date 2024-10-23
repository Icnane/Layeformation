<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Formation;
use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleController extends Controller
{
    // Afficher la liste des modules avec recherche et pagination
    public function index(Request $request): View
    {
        $search = $request->input('search'); // Recherche si un terme est spécifié

        if ($search) {
            $modules = Module::where('titre', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->with('formation')
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        } else {
            $modules = Module::with('formation')->orderBy('created_at', 'desc')->paginate(5);
        }

        $noResults = $modules->isEmpty(); // True si aucun module n'a été trouvé

        return view('modules.index', compact('modules', 'search', 'noResults'));
    }

    // Afficher le formulaire de création d'un module
    public function create(): View
    {
        $formations = Formation::all();
        return view('modules.create', compact('formations'));
    }

    // Stocker un nouveau module
    public function store(StoreModuleRequest $request): RedirectResponse
    {
        Module::create($request->validated());
        return redirect()->route('modules.index')->with('success', 'Module créé avec succès.');
    }

    // Afficher un module spécifique
    public function show(Module $module): View
    {
        return view('modules.show', compact('module'));
    }

    // Afficher le formulaire d'édition d'un module
    public function edit(Module $module): View
    {
        $formations = Formation::all();
        return view('modules.edit', compact('module', 'formations'));
    }

    // Mettre à jour un module
    public function update(UpdateModuleRequest $request, Module $module): RedirectResponse
    {
        $module->update($request->validated());
        return redirect()->route('modules.index')->with('success', 'Module mis à jour avec succès.');
    }

    // Supprimer un module
    public function destroy(Module $module): RedirectResponse
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Module supprimé avec succès.');
    }
}
