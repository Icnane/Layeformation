<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OptionController extends Controller
{
    /**
     * Afficher les options d'une question spécifique.
     */
    public function index(Question $question): View
    {
        $options = $question->options; // Récupérer les options associées à la question
        return view('options.index', compact('question', 'options'));
    }

    /**
     * Afficher le formulaire pour créer une nouvelle option.
     */
    public function create(Question $question): View
    {
        return view('options.create', compact('question'));
    }

    /**
     * Stocker une nouvelle option.
     */
    public function store(Request $request, Question $question): RedirectResponse
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $question->options()->create($request->only('text'));

        return redirect()->route('options.index', $question)->with('success', 'Option créée avec succès.');
    }

    /**
     * Afficher le formulaire d'édition d'une option.
     */
    public function edit(Option $option): View
    {
        return view('options.edit', compact('option'));
    }

    /**
     * Mettre à jour une option.
     */
    public function update(Request $request, Option $option): RedirectResponse
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $option->update($request->only('text'));

        return redirect()->route('options.index', $option->question)->with('success', 'Option mise à jour avec succès.');
    }

    /**
     * Supprimer une option.
     */
    public function destroy(Option $option): RedirectResponse
    {
        $option->delete();
        return redirect()->route('options.index', $option->question)->with('success', 'Option supprimée avec succès.');
    }
}
