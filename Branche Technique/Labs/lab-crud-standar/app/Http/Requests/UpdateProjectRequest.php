<?php

// app/Http/Requests/UpdateProjectRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom' => 'sometimes|string|max:255', 
        ];
    }

    public function messages()
    {
        return [
            'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
            'nom.max' => 'Le champ nom ne peut pas dépasser :max caractères.',
        ];
    }
}

