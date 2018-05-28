<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table='note';

    public $timestamps=false;


	/**
	*  Restraire l'étudiant titulaire de ce note 
	* 
	*  @return App\Etudiant
    */
    public function etudiant()
    {
    	return $this->belongsTo(Etudiant::class,'matricule','matricule');
    }

    /**
	*  Restraire le matière correspondant à ce note 
	* 
	*  @return App\Matiere
    */
    public function matiere()
    {
    	return $this->belongsTo(Matiere::class,'matiere_id','id');
    }
}
