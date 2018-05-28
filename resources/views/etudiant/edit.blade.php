@extends('layout')

@section('title')
 Edition étudiant
@endsection

@section('nav')
    @include('nav',['active'=>'etudiant'])
@endsection

@section('content')

    @include('etudiant.form',['form_title'=>'Editer étudiant','form_url'=>'update_etudiant'])

@endsection
