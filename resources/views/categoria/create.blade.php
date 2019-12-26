@extends('layouts.home')
@section('title', 'Adicionar Categoria.')
@section('content')
    <h1>Nova Categoria</h1>
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
    {{Form::open(['action' => 'CategoriasController@store'])}}
    {{Form::label('codigo', 'Codigo')}}
    {{Form::label('nome', 'Nome')}}
    {{Form::text('nome','',['class'=>'form-control','required',
    'placeholder'=>'Nome'])}}
    {{Form::label('descricao', 'Descrição')}}
    {{Form::textarea('descricao','',['rows'=>3,'class'=>'form-control',
    'required','placeholder'=>'Descrição'])}}
    <br/>
    {{Form::submit('Cadastrar',['class'=>'btn btn-default'])}}
    {{Form::close()}}
@endsection
