<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Autoriser la requête
    }

    public function rules()
    {
        return [
            'question' => 'required|string',
            'options' => 'required|array',
            'correct_option' => 'required|string',
        ];
    }
}
