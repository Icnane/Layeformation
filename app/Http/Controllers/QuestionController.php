<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * Afficher les questions d'un quiz spécifique.
     */
    public function index(Quiz $quiz): View
    {
        $questions = $quiz->questions; // Récupérer les questions associées au quiz
        return view('questions.index', compact('quiz', 'questions'));
    }

    /**
     * Afficher le formulaire pour créer une nouvelle question.
     */
    public function create(Quiz $quiz): View
    {
        return view('questions.create', compact('quiz'));
    }

    /**
     * Stocker une nouvelle question.
     */
    public function store(Request $request, Quiz $quiz): RedirectResponse
    {
        $request->validate([
            'text' => 'required|string|max:500',
            'type' => 'required|string|in:multiple,true_false',
        ]);

        $question = $quiz->questions()->create($request->only('text', 'type'));

        // Ajouter des options si présentes dans la requête
        if ($request->has('options')) {
            foreach ($request->options as $optionText) {
                $question->options()->create(['text' => $optionText]);
            }
        }

        return redirect()->route('questions.index', $quiz)->with('success', 'Question créée avec succès.');
    }

    /**
     * Afficher le formulaire d'édition d'une question.
     */
    public function edit(Question $question): View
    {
        return view('questions.edit', compact('question'));
    }

    /**
     * Mettre à jour une question.
     */
    public function update(Request $request, Question $question): RedirectResponse
    {
        $request->validate([
            'text' => 'required|string|max:500',
            'type' => 'required|string|in:multiple,true_false',
        ]);

        $question->update($request->only('text', 'type'));

        return redirect()->route('questions.index', $question->quiz)->with('success', 'Question mise à jour avec succès.');
    }

    /**
     * Supprimer une question.
     */
    public function destroy(Question $question): RedirectResponse
    {
        $question->delete();
        return redirect()->route('questions.index', $question->quiz)->with('success', 'Question supprimée avec succès.');
    }
}
