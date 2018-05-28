@extends('layout')

@section('title')
 Liste des notes
@endsection

@section('nav')
    @include('nav',['active'=>'note'])
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
                <i class="fa fa-list-alt mr-2"></i>Liste des notes
                <div class="btn btn-sm btn-info" href="#"><span class="badge badge-light">
                    @if(isset($notes))
                        {{ $notes->total()}}
                    @else
                        0
                    @endif
                </span></div>
            </h5>

        </div>
        <div class="pull-right">

            <a class="btn btn-sm btn-info" href="#"> <i class="fa fa-gear mr-2"></i> Paramètre d'affichage</a>
            <a class="btn btn-sm btn-info" href="{{ route('nouveau_note') }}"> <i class="fa fa-plus-circle"></i> Nouveau</a>

        </div>

    </div>

</div>

<div class="row">
    <table class="table table-bordered table-sm">

        <thead>
                <tr>

                    <th class="text-center">Matricule</th>

                    <th>Nom et Prénoms</th>

                    <th>Matière</th>

                    <th class="text-center">Note</th>

                    <th width="200px"></th>

                </tr>
        </thead>
        <tbody>
        @if(isset($notes))
            @foreach($notes as $note)
                    <tr>
                        <td class="text-center">{{ $note->etudiant->matricule }}</td>
                        <td>{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</td>
                        <td>{{ $note->matiere->libelle }}</td>
                        <td class="text-center">{{ $note->note }}</td>
                        <td>
                            <a href="{{ route('edit_note',[ 'id'=>$note->id ]) }}" class="btn btn-sm btn-info"><i class="fa fa-edit mr-2"></i>Editer</a>
                            <a href="#" data-toggle="modal" data-target="#modal-delete-{{ $note->id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o mr-2"></i>Supprimer</a>
                            @include('note.modal-delete',['note'=>$note])
                        </td>
                    </tr>
            @endforeach
           @endif
        </tbody>
    </table>
</div>

<div class="row">
    {!! $notes->links('pagination') !!}
</div>
@endsection
