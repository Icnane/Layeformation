<?php

// app/Http/Controllers/ResourceController.php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Module;
use App\Models\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with('module', 'chapitre')->paginate(10);
        return view('resources.index', compact('resources'));
    }

    public function create()
    {
        $modules = Module::all();
        $chapitres = Chapitre::all();
        return view('resources.create', compact('modules', 'chapitres'));
    }

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

        return redirect()->route('resources.index')->with('success', 'Resource created successfully.');
    }

    public function show(Resource $resource)
    {
        return view('resources.show', compact('resource'));
    }

    public function edit(Resource $resource)
    {
        $modules = Module::all();
        $chapitres = Chapitre::all();
        return view('resources.edit', compact('resource', 'modules', 'chapitres'));
    }

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

        return redirect()->route('resources.index')->with('success', 'Resource updated successfully.');
    }

    public function destroy(Resource $resource)
    {
        if ($resource->video_path) {
            Storage::disk('public')->delete($resource->video_path);
        }

        $resource->delete();
        return redirect()->route('resources.index')->with('success', 'Resource deleted successfully.');
    }
}
