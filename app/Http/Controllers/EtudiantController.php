<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etudiant;
use App\Http\Requests\EtudiantRequest;

class EtudiantController extends Controller
{
	private $page;
    public function __construct($page = 5)
    {
    	$this->page = $page;
    }

    public function index()
    {
    	$etudiants = Etudiant::orderBy('matricule')->paginate($this->page);
    	return view('etudiant.index',['etudiants'=>$etudiants]);
    }

    public function nouveau()
    {
    	return view('etudiant.nouveau');
    }
    public function create(EtudiantRequest $request)
    {
    	$request->validateKey()->validate();

    	$etudiant = new Etudiant;
    	$etudiant->matricule= $request->input('matricule');
    	$etudiant->nom= strtoupper($request->input('nom'));
    	$etudiant->prenom= ucwords(strtolower($request->input('prenom')));
    	$etudiant->adresse= $request->input('adresse');

    	if($etudiant->save()) return redirect()->route('index_etudiant');
    	else return redirect()->route('nouveau_etudiant');
    }
    public function edit($matricule)
    {
    	$etudiant = Etudiant::find($matricule);
    	if($etudiant)
    	{
    		return view('etudiant.edit',['etudiant'=>$etudiant]);
    	}
    	else return redirect(url()->previous());
    }

    public function update(EtudiantRequest $request, $matricule)
    {
    	$request->validateKey($matricule)->validate();

    	$etudiant = Etudiant::find($matricule);

    	if($etudiant)
    	{
    		$etudiant->matricule = $request->input('matricule');
    		$etudiant->nom = strtoupper($request->input('nom'));
    		$etudiant->prenom = ucwords(strtolower($request->input('prenom')));
    		$etudiant->adresse =$request->input('adresse');

    		if($etudiant->save()) return redirect()->route('index_etudiant');
    	}


    	return redirect()->route('edit_etudiant',['id'=>$matricule]);

    }

    public function delete($matricule)
    {
    	$etudiant = Etudiant::find($matricule);
    	if($etudiant && $etudiant->delete())
    	{
    		return redirect()->route('index_etudiant');
    	}
    	else 
    	{
    		return redirect()->route('index_etudiant')->with('error','Impossible de supprimer l\'étudiant <b>'.$matricule.'</b>');
    	}
    }
}
