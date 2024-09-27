<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEtudiantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Autoriser la validation de cette requête
    }

    public function rules(): array
    {
        return [
            'id' => 'required|string|unique:etudiants,id', // L'ID doit être unique
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('etudiants')->ignore($this->route('etudiant'))], // Ignorer l'étudiant actuel lors de l'édition
            'tel' => 'required|digits_between:8,15',
            'sexe' => 'required|in:homme,femme',
            'age' => 'required|integer|min:16|max:100',
            'formation' => 'required|string',
            'mode' => 'required|string|in:en-ligne,presentiel',
            'ville' => 'required|string|max:255',
        ];
    }
}
