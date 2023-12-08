<?php


// app/Http/Requests/StoreProjectRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom' => 'required | max:50',
            'description' => 'nullable|max:555',
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le champ nom est requis.',
            'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
            'nom.max' => 'Le champ nom ne peut pas dépasser :max caractères.',
        ];
    }
}
