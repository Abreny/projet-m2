<?php

use Illuminate\Database\Seeder;
use App\Etudiant;
use App\Matiere;
use App\Note;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ets = Etudiant::all();
        $mats = Matiere::all();

        foreach ($ets as $et) {
        	foreach ($mats as $mat) {
        		$note= new Note();
        		
        		$note->etudiant()->associate($et);

        		$note->matiere()->associate($mat);

        		$note->note = 15;

        		$note->save();
        	}
        }
    }
}
