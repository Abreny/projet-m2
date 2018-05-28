<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $table="etudiant";

    protected $primaryKey="matricule";

    public $incrementing=false;

    public $timestamps=false;

    /**
     * The notes that belong to the etudiant.
     */
    public function notes()
    {
        return $this->hasMany(Note::class,'matricule','matricule');
    }

}
