<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Chapitre;
use App\Models\Question;
use App\Models\Option; // Assurez-vous d'importer le modèle Option
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
            $quizzes = Quiz::where('titre', 'like', '%' . $search . '%')
                ->with('chapitre')
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        } else {
            $quizzes = Quiz::with('chapitre')->orderBy('created_at', 'desc')->paginate(5);
        }

        // Vérifiez si des quizzes ont été trouvés
        $noResults = $quizzes->isEmpty(); // True si aucun quiz n'a été trouvé

        return view('quiz.index', compact('quizzes', 'search', 'noResults'));
    }

    // Afficher le formulaire de création d'un quiz
    public function create(): View
    {
        $chapitres = Chapitre::all();
        return view('quiz.create', compact('chapitres'));
    }

    // Stocker un nouveau quiz
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'titre' => 'required|string',
            'chapitre_id' => 'required|exists:chapitres,id',
            'questions' => 'required|array|min:10', // S'assurer qu'il y a au moins 10 questions
            'questions.*.text' => 'required|string',
            'questions.*.type' => 'required|string|in:multiple,true_false',
            'questions.*.options' => 'required|array',
            'questions.*.options.*' => 'required|string', // Chaque option doit être une chaîne
        ]);

        // Création du quiz
        $quiz = Quiz::create($request->only(['titre', 'chapitre_id']));

        foreach ($request->questions as $questionData) {
            // Créer les questions avec leurs options ici
            $question = new Question();
            $question->text = $questionData['text'];
            $question->type = $questionData['type'];
            $question->quiz_id = $quiz->id; // Lier le quiz à la question

            $question->save();

            // Sauvegarder les options
            foreach ($questionData['options'] as $optionText) {
                $option = new Option();
                $option->text = $optionText;
                $option->question_id = $question->id; // Lier l'option à la question
                $option->save();
            }
        }

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
        $questions = $quiz->questions; // Récupérer les questions associées au quiz
        return view('quiz.edit', compact('quiz', 'chapitres', 'questions'));
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
