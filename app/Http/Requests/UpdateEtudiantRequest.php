<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEtudiantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Modifiez si vous avez des règles d'autorisation
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id' => 'required|string|unique:etudiants,id', // L'ID doit être unique
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('etudiants')->ignore($this->route('etudiant'))], // Ignorer l'étudiant actuel lors de l'édition
            'sexe' => 'required|in:M,F',
            'age' => 'required|integer|min:16|max:100',
            'formation' => 'required|string',
            'mode' => 'required|string|in:en-ligne,presentiel',
            'ville' => 'required|string|max:255',
        ];
    }
}
