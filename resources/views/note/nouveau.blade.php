@extends('layout')

@section('title')
 Nouveau note
@endsection

@section('nav')
    @include('nav',['active'=>'note'])
@endsection

@section('content')

    @include('note.form',['form_title'=>'Nouveau note','form_url'=>'create_note'])

@endsection
