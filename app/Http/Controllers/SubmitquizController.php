<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubmitQuizController extends Controller
{
    /**
     * Soumettre un quiz et calculer le score.
     */
    public function submitQuiz(Request $request, $quiz_id): View
    {
        // Récupérer le quiz
        $quiz = Quiz::findOrFail($quiz_id);
        $score = 0;
        $totalQuestions = $quiz->questions->count();

        // Vérifier si des questions existent
        if ($totalQuestions === 0) {
            return view('quiz.result', [
                'percentage' => 0,
                'message' => 'Aucune question disponible.'
            ]);
        }

        // Parcourir les questions et évaluer les réponses
        foreach ($quiz->questions as $question) {
            $userAnswer = $request->input('answers.' . $question->id);

            // Récupérer les réponses correctes
            $correctAnswers = $question->answers->where('correct', true)->pluck('id')->toArray();

            // Vérifier si la réponse de l'utilisateur est correcte
            if (in_array($userAnswer, $correctAnswers)) {
                $score++;
            }
        }

        // Calculer le pourcentage
        $percentage = ($score / $totalQuestions) * 100;

        // Déterminer le message de résultat
        $message = $percentage >= 80 ? 'Bravo, vous avez réussi !' : 'Désolé, vous avez échoué.';

        return view('quiz.result', compact('percentage', 'message'));
    }
}
