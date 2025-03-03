<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "pseudo" => "required",
            "password" => "required"
        ];
    }

    public function messages(){
        return [
            "pseudo.required"=> "vous devez ajoutez un nom d'utilisateur",
            "password.required"=> "vous devez jouter un mot de passe"
        ];

    }

    public function getCredentials(){
        return $this->only("pseudo","password");
    }
}
