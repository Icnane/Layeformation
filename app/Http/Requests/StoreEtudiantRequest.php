<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEtudiantRequest extends FormRequest
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
            'id' => 'required|string|unique:etudiants,id', // Assurez-vous que l'ID soit unique
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants,email', // L'email doit être unique
            'tel' => 'required|digits_between:8,15', // Numéro de téléphone, ajustez selon vos besoins
            'sexe' => 'required|in:homme,femme',
            'age' => 'required|integer|min:16|max:100',
            'formation' => 'required|string',
            'mode' => 'required|string|in:en-ligne,presentiel', // Limité à ces deux options
            'ville' => 'required|string|max:255',
        ];
    }
}
