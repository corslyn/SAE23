<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupReq extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email" => "required|email|max:50|unique:utilisateurs",
            "mot_de_passe" => "required",
            "mot_de_passe_confirmation" => "required|same:mot_de_passe",
            
            "nom" => "required|max:50",
            
            "id_vehicule" => "required:exist:vehicules",
            
            "formation" => "required|max:50",
            "sous_groupe" => "required|max:50",
        ];
    }
}
