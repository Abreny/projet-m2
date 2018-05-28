<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use Illuminate\Validation\Rule;

class EtudiantRequest extends FormRequest
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
            'matricule'=>'required|numeric',
            'nom'=>'required',
            'prenom'=>'nullable',
            'adresse'=>'required'
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
            'matricule.required'=>'Le <b>numéro matricule</b> ne doit pas être vide',
            'matricule.numeric'=>'Le <b>numéro matricule</b> ne contient que des caractères numériques 0-9 ',
            'matricule.unique'=>'Le <b>numéro matricule</b> doit être unique pour chaque etudiant',
            'nom.required'=>'Le <b>nom</b> ne doit pas être vide',
            'adresse.required'=>'L\' <b>adresse</b> ne doit pas être vide'
        ];
    }

    /**
     * Check if a matricule $matricule is unique.
     *
     * @param $matricule
     *
     * @return Validator
     */
    public function validateKey($matricule=null)
    {
        $validator = null;
        $messages = [
            'matricule.unique'=>'Le <b>numéro matricule</b> doit être unique pour chaque etudiant'
        ];
        $rules =[];
        if($matricule)
        {
            $rules=[
                'matricule'=>[
                    Rule::unique('etudiant')->ignore($matricule,'matricule')
                ]
            ]; 
        }
        else
        {
            $rules=[
                'matricule'=>'unique:etudiant,matricule'
            ];
        }
        $validator= Validator::make($this->all(),$rules,$messages);

        return $validator;
    }
}
