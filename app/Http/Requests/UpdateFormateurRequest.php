<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormateurRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Règles de validation pour la mise à jour d'un formateur.
     */
    public function rules(): array
    {
        $formateurId = $this->route('formateur')->id; // Récupère l'ID du formateur à partir de la route

        return [
            'id' => 'required|integer|unique:formateurs,id,' . $formateurId,
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:formateurs,email,' . $formateurId,
            'contact' => 'required|numeric|digits_between:1,15',
        ];
    }
}
