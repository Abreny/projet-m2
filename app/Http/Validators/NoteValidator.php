<?php

namespace App\Http\Validators;
use App\Note;

class NoteValidator
{

	public function validate($attribute, $value, $parameters, $validator)
	{
		$other_field = $parameters[0];
		$ignore_id = null;
		if(count($parameters) == 2)$ignore_id = $parameters[1];
		$data = $validator->getData();
		$etudiant = $data[$attribute];
        $matiere = $data[$other_field];
        $where = Note::with(['etudiant','matiere'])->where($attribute,$etudiant)->where($other_field,$matiere);

        if($ignore_id) $where->where('id','!=',$ignore_id);

        $note = $where->first();
        define('MESSAGE_UNIQUE_NOTE',$note ? 'La <b>note '.$note->matiere->libelle.'</b> de l\'<b>étudiant '.$note->etudiant->nom.'</b> doit être unique' : '');
        $validator->addReplacer('unique_note',function ($message, $attribute, $rule, $parameters) {
        	return MESSAGE_UNIQUE_NOTE;
    	});
        //var_dump($note);
        return !$note;

	}

}