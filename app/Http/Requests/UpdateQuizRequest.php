<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizRequest extends FormRequest
{
    /**
     * Autoriser la requête.
     */
    public function authorize(): bool
    {
        return true; // Autoriser toutes les requêtes
    }

    /**
     * Obtenir les règles de validation.
     */
    public function rules(): array
    {
        return [
            'titre' => 'required|string|max:255',
            'chapitre_id' => 'required|exists:chapitres,id',
            'questions' => 'required|array|min:1',
            'questions.*.text' => 'required|string|max:500', // Flexibilité accrue pour le texte
            'questions.*.type' => 'required|string|in:multiple,true_false',
            'questions.*.options' => 'required|array|min:2',
            'questions.*.options.*' => 'required|string|max:255',
        ];
    }
}
