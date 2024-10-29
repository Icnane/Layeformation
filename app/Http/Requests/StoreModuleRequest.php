<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModuleRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Autoriser la requête
    }

    public function rules(): array
{
    return [
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'formation_id' => 'required|exists:formations,id',
    ];
}
}
