@extends('layout')

@section('title')
 Nouveau étudiant
@endsection

@section('nav')
    @include('nav',['active'=>'etudiant'])
@endsection

@section('content')

    @include('etudiant.form',['form_title'=>'Nouveau étudiant','form_url'=>'create_etudiant'])

@endsection
