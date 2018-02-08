<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppartenanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_equipe' => 'required',
            'id_public' => 'required|string|exists:users,id_public',
        ];
    }

    public function messages()
    {
        return [
            'id_public.required' => "Vous devez entrer un ID valide",
            'id_public.exists' => "Cet ID n'existe pas...",
        ];
    }
}
