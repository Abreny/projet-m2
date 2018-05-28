@extends('layout')

@section('title')
 Nouveau matière
@endsection

@section('nav')
    @include('nav',['active'=>'matiere'])
@endsection

@section('content')

    @include('matiere.form',['form_title'=>'Nouveau matière','form_url'=>'create_matiere'])

@endsection
