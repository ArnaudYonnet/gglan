<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TournoisRequest extends FormRequest
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
            'nom' => 'required|string|max:255',
            'date_deb' => 'required|date',
            'date_fin' => 'required|date',
            'description' => 'required|string|',
            'id_jeu' => 'required',
            'status' => 'required',
        ];
    }
}
