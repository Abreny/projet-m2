<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Note;
use Validator;

class NoteRequest extends FormRequest
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
            'matricule'=>'required',
            'matiere_id'=>'required',
            'note'=>'required|numeric|between:0,20'
        ];
    }

    /**
     * Get the validation error's messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'matricule.required'=>'Vous devez choisir un <b>étudiant</b>.',
            'matiere_id.required'=>'Vous devez choisir un <b>matière</b>.',
            'note.required'=>'Vous devez entrer une <b>note</b>.',
            'note.numeric'=>'Une <b>note</b> doit être un nombre.',
            'note.between'=>'La <b>note</b> doit être compris entre :min - :max'
        ];
    }

    /**
     * Check if a etudiant and a matiere is unique.
     *
     *
     * @return Validator
     */
    public function validateUniqueNote($id = null)
    {
        $validator = null;
        $rules=[
            'matricule'=> $id ? 'unique_note:matiere_id,'.$id : 'unique_note:matiere_id'
        ];
        $validator= Validator::make($this->all(),$rules);
        return $validator;
    }

}
