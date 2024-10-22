<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Chapitre;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuizController extends Controller
{
    // Afficher la liste des quizzes avec recherche et pagination
    public function index(Request $request): View
    {
        $search = $request->input('search'); // Recherche si un terme est spécifié

        if ($search) {
            $quizzes = Quiz::where('question', 'like', '%' . $search . '%')
                ->with('chapitre')
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        } else {
            $quiz = Quiz::with('chapitre')->orderBy('created_at', 'desc')->paginate(5);
        }

        // Vérifiez si des quizzes ont été trouvés
        $noResults = $quiz->isEmpty(); // True si aucun quiz n'a été trouvé

        return view('quiz.index', compact('quiz', 'search', 'noResults'));
    }

    // Afficher le formulaire de création d'un quiz
    public function create(): View
    {
        $chapitres = Chapitre::all();
        return view('quiz.create', compact('chapitres'));
    }

    // Stocker un nouveau quiz
    public function store(StoreQuizRequest $request): RedirectResponse
    {
        Quiz::create($request->validated());
        return redirect()->route('quiz.index')->with('success', 'Quiz créé avec succès.');
    }

    // Afficher un quiz spécifique
    public function show(Quiz $quiz): View
    {
        return view('quiz.show', compact('quiz'));
    }

    // Afficher le formulaire d'édition d'un quiz
    public function edit(Quiz $quiz): View
    {
        $chapitres = Chapitre::all();
        return view('quiz.edit', compact('quiz', 'chapitres'));
    }

    // Mettre à jour un quiz
    public function update(UpdateQuizRequest $request, Quiz $quiz): RedirectResponse
    {
        $quiz->update($request->validated());
        return redirect()->route('quiz.index')->with('success', 'Quiz mis à jour avec succès.');
    }

    // Supprimer un quiz
    public function destroy(Quiz $quiz): RedirectResponse
    {
        $quiz->delete();
        return redirect()->route('quiz.index')->with('success', 'Quiz supprimé avec succès.');
    }
}
