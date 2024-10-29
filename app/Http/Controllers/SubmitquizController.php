<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SubmitquizController extends Controller
{
    public function submitQuiz(Request $request, $quiz_id)
{
    $quiz = Quiz::find($quiz_id);
    $score = 0;
    $totalQuestions = $quiz->questions->count();

    foreach ($quiz->questions as $question) {
        $userAnswer = $request->input('answers.'.$question->id);
        $correctAnswers = $question->answers->where('correct', true)->pluck('id')->toArray();

        if (in_array($userAnswer, $correctAnswers)) {
            $score += 1;
        }
    }

    $percentage = ($score / $totalQuestions) * 100;

    if ($percentage >= 80) {
        // Success
    } else {
        // Fail
    }

    return view('quiz.result', compact('percentage'));
}

}
