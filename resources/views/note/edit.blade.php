@extends('layout')

@section('title')
 Edition note
@endsection

@section('nav')
    @include('nav',['active'=>'note'])
@endsection

@section('content')

    @include('note.form',['form_title'=>'Editer note','form_url'=>'update_note'])

@endsection
