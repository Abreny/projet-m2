<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $table="matiere";

    public $timestamps=false;

    /**
     * The notes that belong to the matiere.
     */
    public function notes()
    {
        return $this->hasMany(Note::class,'matiere_id','id');
    }
}
