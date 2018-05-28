@extends('layout')

@section('title')
 Edition matière
@endsection

@section('nav')
    @include('nav',['active'=>'matiere'])
@endsection

@section('content')

    @include('matiere.form',['form_title'=>'Editer matière','form_url'=>'update_matiere'])

@endsection
