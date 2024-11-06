<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuizRequest extends FormRequest
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
            'questions' => 'required|array|min:10',
            'questions.*.text' => 'required|string|max:500', // Augmenté à 500 pour plus de flexibilité
            'questions.*.type' => 'required|string|in:multiple,true_false',
            'questions.*.options' => 'required|array|min:2',
            'questions.*.options.*' => 'required|string|max:255',
        ];
    }
}
