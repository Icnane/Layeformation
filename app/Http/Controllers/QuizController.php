<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Chapitre;
use App\Models\Module;
use App\Models\Question;
use App\Models\Option;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuizController extends Controller
{
    // Afficher la liste des quizzes
    public function index(Request $request): View
    {
        $search = $request->input('search'); 

        $quizzes = Quiz::with('chapitre')
            ->when($search, function ($query) use ($search) {
                return $query->where('titre', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $noResults = $quizzes->isEmpty();

        return view('quiz.index', compact('quizzes', 'search', 'noResults'));
    }

    // Afficher le formulaire de création de quiz
    public function create(): View
    {
        $chapitres = Chapitre::all();
        $modules = Module::all();  // Récupère les modules disponibles
        return view('quiz.create', compact('chapitres', 'modules'));
    }

    // Sauvegarder le quiz et ses questions
    public function store(StoreQuizRequest $request): RedirectResponse
{
    // Validation du nombre de questions
    if (count($request->questions) > 10) {
        return redirect()->back()->withErrors('Vous ne pouvez ajouter plus de 10 questions.');
    }

    // Création du quiz
    $quiz = Quiz::create([
        'titre' => $request->titre,
        'chapitre_id' => $request->chapitre_id,
        'module_id' => $request->module_id,  // Assurez-vous que le champ existe dans votre formulaire
    ]);

    if (!$quiz) {
        return redirect()->back()->withErrors('Erreur lors de la création du quiz.');
    }

    // Validation des données de chaque question
    $request->validate([
        'questions.*.text' => 'required|string', // Validation pour 'text' de chaque question
        'questions.*.type' => 'required|in:multiple_choice,true_false,short_answer', // Validation pour 'type' de chaque question
        'questions.*.options' => 'required|array|min:1', // Validation des options
    ]);

    // Vérification que la clé 'questions' existe et qu'il y a des données à traiter
    if (!empty($request->questions)) {
        foreach ($request->questions as $questionData) {
            // Vérification que chaque question contient bien 'text' et 'type'
            if (isset($questionData['text'], $questionData['type'])) {
                // Créer la question et l'associer au quiz
                $question = $quiz->questions()->create([
                    'text' => $questionData['text'],
                    'type' => $questionData['type'],
                ]);

                // Ajouter les options à la question
                foreach ($questionData['options'] as $optionText) {
                    // Créer les options associées à la question
                    $question->options()->create(['text' => $optionText]);
                }
            } else {
                // Logique si les données sont incorrectes
                continue; // Passer à la question suivante si 'text' ou 'type' sont manquants
            }
        }
    } else {
        return redirect()->back()->withErrors(['questions' => 'Aucune question envoyée.']);
    }

    return redirect()->route('quiz.index')->with('success', 'Quiz créé avec succès.');
}
public function show($id)
{
    $quiz = Quiz::findOrFail($id); // Récupérer le quiz par son ID
    return view('quiz.show', compact('quiz')); // Retourner la vue avec le quiz
}

    // Afficher le formulaire d'édition d'un quiz
    public function edit(Quiz $quiz): View
    {
        $chapitres = Chapitre::all();
        $modules = Module::all(); // Pour afficher les modules dans le formulaire d'édition
        $questions = $quiz->questions; 
        return view('quiz.edit', compact('quiz', 'chapitres', 'modules', 'questions'));
    }

    // Mettre à jour le quiz et ses questions
    public function update(UpdateQuizRequest $request, Quiz $quiz): RedirectResponse
    {
        // Mise à jour du quiz
        $quiz->update($request->only(['titre', 'chapitre_id', 'module_id']));

        // Validation et mise à jour des questions
        $this->validateQuestions($request);

        // Mise à jour ou création des questions et options
        foreach ($request->questions as $questionData) {
            // Mettre à jour ou créer la question
            $question = $quiz->questions()->updateOrCreate(
                ['id' => $questionData['id'] ?? null],
                ['text' => $questionData['text'], 'type' => $questionData['type']]
            );

            // Mise à jour ou création des options
            foreach ($questionData['options'] as $optionText) {
                $question->options()->updateOrCreate(
                    ['text' => $optionText], 
                    ['text' => $optionText]
                );
            }
        }

        return redirect()->route('quiz.index')->with('success', 'Quiz mis à jour avec succès.');
    }

    // Supprimer un quiz
    public function destroy(Quiz $quiz): RedirectResponse
    {
        // Supprimer le quiz
        $quiz->delete();
        return redirect()->route('quiz.index')->with('success', 'Quiz supprimé avec succès.');
    }

    // Méthode pour valider les questions et leur contenu
    protected function validateQuestions(Request $request)
    {
        // Validation des données envoyées via le formulaire
        $request->validate([
            'questions.*.text' => 'required|string', // Validation pour 'text' de chaque question
            'questions.*.type' => 'required|in:multiple_choice,true_false,short_answer', // Validation pour 'type' de chaque question
        ]);

        // Vérification que la clé 'questions' existe et qu'il y a des données à traiter
        if (empty($request->questions)) {
            return redirect()->back()->withErrors(['questions' => 'Aucune question envoyée.']);
        }

        foreach ($request->questions as $questionData) {
            // Vérification que chaque question contient bien 'text' et 'type'
            if (empty($questionData['text']) || empty($questionData['type'])) {
                return redirect()->back()->withErrors(['questions' => 'Chaque question doit avoir un texte et un type valide.']);
            }
        
        }
    
    }

    public function getQuestions($quizId)
    {
        $quiz = Quiz::with('questions.options')->find($quizId);
        return response()->json([
            'questions' => $quiz->questions
        ]);
    }

    public function submit(Request $request, $id)
    {
        // Logique pour traiter la soumission du quiz
    }

}
   
