<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matiere;
use App\Http\Requests\MatiereRequest;

class MatiereController extends Controller
{
    private $page;
    public function __construct($page = 5)
    {
    	$this->page = $page;
    }

    public function index()
    {
    	$matieres = Matiere::orderBy('id')->paginate($this->page);
    	return view('matiere.index',['matieres'=>$matieres]);
    }

    public function nouveau()
    {
    	return view('matiere.nouveau');
    }
    public function create(MatiereRequest $request)
    {
    	$matiere = new Matiere;
    	$matiere->libelle = strtoupper($request->input('libelle'));
    	$matiere->coefficient = $request->input('coefficient');

    	if($matiere->save()) return redirect()->route('index_matiere');
    	else return redirect()->route('nouveau_matiere');
    }
    public function edit($id)
    {
    	$matiere = Matiere::find($id);
    	if($matiere)
    	{
    		return view('matiere.edit',['matiere'=>$matiere]);
    	}
    	else return redirect(url()->previous());
    }

    public function update(MatiereRequest $request, $id)
    {
    	$matiere = Matiere::find($id);

    	if($matiere)
    	{
    		$matiere->libelle = $request->input('libelle');
    		$matiere->coefficient = $request->input('coefficient');

    		if($matiere->save()) return redirect()->route('index_matiere');
    	}


    	return redirect()->route('edit_matiere',['id'=>$id]);

    }

    public function delete($id)
    {
    	$matiere = Matiere::find($id);
    	if($matiere && $matiere->delete())
    	{
    		return redirect()->route('index_matiere');
    	}
    	else 
    	{
    		return redirect()->route('index_matiere')->with('error','Impossible de supprimer l\'étudiant <b>'.$id.'</b>');
    	}
    }
}
