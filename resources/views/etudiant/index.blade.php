@extends('layout')

@section('title')
 Liste des étudiants
@endsection

@section('nav')
    @include('nav',['active'=>'etudiant'])
@endsection

@section('content')


@if ($message = Session::get('error'))

	<div class="alert alert-danger">

	<p class="text-center">{!! $message !!}</p>

	</div>

@endif

<div class="row mb-2">

    <div class="col-lg-12">

        <div class="pull-left">

            <h5>
            	<i class="fa fa-list-alt mr-2"></i>Liste des étudiants
            	<div class="btn btn-sm btn-info" href="#"><span class="badge badge-light">
            		@if(isset($etudiants))
            			{{ $etudiants->total()}}
            		@else
            			0
            		@endif
            	</span></div>
            </h5>

        </div>
        <div class="pull-right">

        	<a class="btn btn-sm btn-info" href="#"> <i class="fa fa-gear mr-2"></i> Paramètre d'affichage</a>
            <a class="btn btn-sm btn-info" href="{{ route('nouveau_etudiant') }}"> <i class="fa fa-plus-circle"></i> Nouveau</a>

        </div>

    </div>

</div>

<div class="row">
    <table class="table table-bordered table-sm">

        <thead>
                <tr>

                    <th class="text-center">IM</th>

                    <th>Nom</th>

                    <th>Prénom</th>

                    <th class="text-center">Moyenne</th>

                    <th width="200px"></th>

                </tr>
        </thead>
        <tbody>
        @if(isset($etudiants))
            @foreach($etudiants as $etudiant)
            <tr>
                    <td class="text-center">{{ $etudiant->matricule }}</td>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td class="text-center">{{ $etudiant->moyenne }}</td>
                    <td>
                        <a href="{{ route('edit_etudiant',[ 'id'=>$etudiant->matricule ]) }}" class="btn btn-sm btn-info"><i class="fa fa-edit mr-2"></i>Editer</a>
                        <a href="#" data-toggle="modal" data-target="#modal-delete-{{ $etudiant->matricule }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o mr-2"></i>Supprimer</a>
                        @include('etudiant.modal-delete',['etudiant'=>$etudiant])
                    </td>
                </tr>
            @endforeach
           @endif
        </tbody>
    </table>
</div>

<div class="row">
	{!! $etudiants->links('pagination') !!}
</div>
@endsection
