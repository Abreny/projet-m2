<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatiereRequest extends FormRequest
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
            'libelle'=>'required',
            'coefficient'=>'required|numeric|between:1,20'
        ];
    }

     /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'libelle.required'=>'Le <b>libellé</b> ne doit pas être vide',
            'coefficient.numeric'=>'Le <b>coefficient</b> ne contient que des caractères numériques 0-9 ',
            'coefficient.required'=>'Le <b>coefficient</b> ne doit pas être vide',
            'coefficient.between'=>'Le <b>coefficient</b> doit être compris entre :min - :max'
        ];
    }

}
