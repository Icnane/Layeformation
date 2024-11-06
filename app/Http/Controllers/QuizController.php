<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Chapitre;
use App\Models\Question;
use App\Models\Option;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuizController extends Controller
{
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

    public function create(): View
    {
        $chapitres = Chapitre::all();
        return view('quizzes.create', compact('chapitres'));
    }

    public function store(StoreQuizRequest $request): RedirectResponse
    {
        // Créer le quiz
        $quizzes = Quiz::create($request->only(['titre', 'chapitre_id']));
    
        if (!$quizzes) {
            // Gérer l'erreur de création du quiz
            return redirect()->back()->withErrors('Erreur lors de la création du quiz.');
        }
    
        foreach ($request->questions as $questionData) {
            $options = json_encode($questionData['options']);
    
            // Créer la question
            $question = $quizzes->questions()->create([
                'text' => $questionData['text'],
                'type' => $questionData['type'],
                'options' => $options,
                'quizzes_id' => $quizzes->id,
            ]);
            
            // Créer les options associées
            foreach ($questionData['options'] as $optionText) {
                $question->options()->create(['text' => $optionText]);
            }
        }
    
        return redirect()->route('quiz.index')->with('success', 'Quiz créé avec succès.');
    }
    
    

    public function show(Quiz $quizzes): View
    {
        return view('quiz.show', compact('quizzes'));
    }

    public function edit(Quiz $quiz): View
    {
        $chapitres = Chapitre::all();
        $questions = $quiz->questions; 
        return view('quiz.edit', compact('quiz', 'chapitres', 'questions'));
    }

    public function update(UpdateQuizRequest $request, Quiz $quiz): RedirectResponse
    {
        $quiz->update($request->only(['titre', 'chapitre_id']));

        foreach ($request->questions as $questionData) {
            $question = $quiz->questions()->updateOrCreate(
                ['id' => $questionData['id'] ?? null], 
                ['text' => $questionData['text'], 'type' => $questionData['type']]
            );

            foreach ($questionData['options'] as $optionText) {
                $question->options()->updateOrCreate(
                    ['text' => $optionText], 
                    ['text' => $optionText]
                );
            }
        }

        return redirect()->route('quiz.index')->with('success', 'Quiz mis à jour avec succès.');
    }

    public function destroy(Quiz $quiz): RedirectResponse
    {
        $quiz->delete();
        return redirect()->route('quiz.index')->with('success', 'Quiz supprimé avec succès.');
    }
}
