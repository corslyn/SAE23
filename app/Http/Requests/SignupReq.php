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
            "prenom" => "required|max:50",
            "nom" => "required|max:50",
            "domiciliation" => "required|max:50",
            "groupe" => "required|max:50",
            "sous_groupe" => "required|max:50",
            "nom_formation" => "required|max:50",
            "email" => "required|email|max:50|unique:utilisateurs",
            "mot_de_passe" => "required",
            "mot_de_passe_confirmation" => "required|same:mot_de_passe"
        ];
    }
}
