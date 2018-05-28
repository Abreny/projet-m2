@extends('layout')

@section('title')
 Liste des matières
@endsection

@section('nav')
    @include('nav',['active'=>'matiere'])
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
            	<i class="fa fa-list-alt mr-2"></i>Liste des matières
            	<div class="btn btn-sm btn-info" href="#"><span class="badge badge-light">
            		@if(isset($matieres))
            			{{ $matieres->total()}}
            		@else
            			0
            		@endif
            	</span></div>
            </h5>

        </div>
        <div class="pull-right">

        	<a class="btn btn-sm btn-info" href="#"> <i class="fa fa-gear mr-2"></i> Paramètre d'affichage</a>
            <a class="btn btn-sm btn-info" href="{{ route('nouveau_matiere') }}"> <i class="fa fa-plus-circle"></i> Nouveau</a>

        </div>

    </div>

</div>

<div class="row">
    <table class="table table-bordered table-sm">

        <thead>
                <tr>

                    <th class="text-center">Id</th>

                    <th>Libelle</th>

                    <th class="text-center">Coefficient</th>

                    <th width="200px"></th>

                </tr>
        </thead>
        <tbody>
        @if(isset($matieres))
            @foreach($matieres as $matiere)
            <tr>
                    <td class="text-center">{{ $matiere->id }}</td>
                    <td>{{ $matiere->libelle }}</td>
                    <td class="text-center">{{ $matiere->coefficient }}</td>
                    <td>
                        <a href="{{ route('edit_matiere',[ 'id'=>$matiere->id ]) }}" class="btn btn-sm btn-info"><i class="fa fa-edit mr-2"></i>Editer</a>
                        <a href="#" data-toggle="modal" data-target="#modal-delete-{{ $matiere->id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o mr-2"></i>Supprimer</a>
                        @include('matiere.modal-delete',['matiere'=>$matiere])
                    </td>
                </tr>
            @endforeach
           @endif
        </tbody>
    </table>
</div>

<div class="row">
	{!! $matieres->links('pagination') !!}
</div>
@endsection
