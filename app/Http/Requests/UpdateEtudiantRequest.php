<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'id' => 'required|string|exists:etudiants,id', // Assurez-vous que l'ID existe
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants,email,' . $this->etudiant->id, // Ignorer l'email actuel
            'tel' => 'required|digits_between:8,15',
            'sexe' => 'required|in:homme,femme',
            'age' => 'required|integer|min:16|max:100',
            'formation' => 'required|string',
            'mode' => 'required|string|in:en-ligne,presentiel',
            'ville' => 'required|string|max:255',
        ];
    }
}
