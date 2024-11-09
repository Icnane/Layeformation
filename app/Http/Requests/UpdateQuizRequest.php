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
            'questions' => 'required|array|min:1', // Au moins une question est nécessaire
            'questions.*.id' => 'nullable|exists:questions,id', // Permet de valider l'existence des questions si elles sont mises à jour
            'questions.*.text' => 'required|string|max:500', // Flexibilité accrue pour le texte des questions
            'questions.*.type' => 'required|string|in:multiple,true_false', // Type de question (multiple ou vrai/faux)
            'questions.*.options' => 'required|array|min:2', // Au moins 2 options par question
            'questions.*.options.*' => 'required|string|max:255', // Validation des options de réponse
        ];
    }
}
