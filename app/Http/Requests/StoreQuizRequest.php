<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreQuizRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Autoriser toutes les requêtes
        return true;
    }

    public function rules(): array
    {
        return [
            'titre' => 'required|string|max:255',
            'chapitre_id' => 'required|exists:chapitres,id',
            'questions' => 'required|array|min:10',
            'questions.*.text' => 'required|string|max:500', // Augmenté à 500 pour plus de flexibilité
            'questions.*.type' => 'required|string|in:multiple,true_false',
            'questions.*.options' => 'required|array|min:2',
            'questions.*.options.*' => 'required|string|max:255',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $questions = $this->input('questions', []);

            foreach ($questions as $index => $question) {
                if ($question['type'] === 'multiple' && count($question['options']) < 4) {
                    // Ajoute une erreur si une question à choix multiple a moins de 4 options
                    $validator->errors()->add(
                        "questions.$index.options",
                        'Les questions de type multiple doivent avoir au moins 4 options.'
                    );
                }
            }
        });
    }
}
