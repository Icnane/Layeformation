<?php
// app/Http/Requests/DomaineRequest.php
// app/Http/Requests/DomaineRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomaineRequest extends FormRequest
{
    public function authorize()
    {
        return true;  // Assurez-vous de bien gérer les autorisations si nécessaire
    }

    public function rules()
    {
        return [
            'id' => 'required|unique:domaines,id' . ($this->isMethod('put') ? ",$this->id" : ''),
            'nom' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validation pour le logo
        ];
    }

    public function messages()
    {
        return [
            'logo.image' => 'Le logo doit être une image.',
            'logo.mimes' => 'Le logo doit être un fichier de type : jpeg, png, jpg, gif.',
            'logo.max' => 'Le logo ne doit pas dépasser 2 Mo.',
        ];
    }
}

