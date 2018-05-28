<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Matiere;
use App\Etudiant;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    private $page;
    public function __construct($page = 5)
    {
    	$this->page = $page;
    }

    public function index()
    {
    	$notes = Note::with(['etudiant','matiere'])->orderBy('matricule')->paginate($this->page);
    	return view('note.index',['notes'=>$notes]);
    }
    public function nouveau()
    {
        $matieres = Matiere::orderBy('id')->get();
        $etudiants = Etudiant::orderBy('matricule')->get();
        return view('note.nouveau',['matieres'=>$matieres,'etudiants'=>$etudiants]);
    }
    public function create(NoteRequest $request)
    {
        $request->validateUniqueNote()->validate();
        $note = new Note;
        $note->matricule = $request->input('matricule');
        $note->matiere_id = $request->input('matiere_id');
        $note->note = $request->input('note');

        if($note->save()) return redirect()->route('index_note');
        else return redirect()->route('nouveau_note');
    }
    public function edit($id)
    {
        $note = Note::with(['etudiant','matiere'])->find($id);
        if($note)
        {
            $matieres = Matiere::orderBy('id')->get();
            $etudiants = Etudiant::orderBy('matricule')->get();
            return view('note.edit',['note'=>$note,'etudiants'=>$etudiants,'matieres'=>$matieres]);
        }
        else return redirect(url()->previous());
    }

    public function update(NoteRequest $request, $id)
    {
        $request->validateUniqueNote($id)->validate();
        $note = Note::find($id);

        if($note)
        {
            $note->note = $request->input('note');
            $note->matiere_id = $request->input('matiere_id');
            $note->matricule = $request->input('matricule');

            if($note->save()) return redirect()->route('index_note');
        }


        return redirect()->route('edit_note',['id'=>$id]);

    }

    public function delete($id)
    {
        $note = Note::find($id);
        if($note && $note->delete())
        {
            return redirect()->route('index_note');
        }
        else 
        {
            return redirect()->route('index_note')->with('error','Impossible de supprimer l\'étudiant <b>'.$id.'</b>');
        }
    }
}
