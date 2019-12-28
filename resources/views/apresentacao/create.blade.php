@extends('layouts.home')
@section('title', 'Adicionar Apresentação.')
@section('content')
    <h1>Apresentação</h1>
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
    {{Form::open(['action' => 'ApresentacaosController@store'])}}
    {{Form::label('nome', 'Nome')}}
    {{Form::text('nome','',['class'=>'form-control','required',
    'placeholder'=>'Nome'])}}
    {{Form::label('descricao', 'Descrição')}}
    {{Form::textarea('descricao','',['rows'=>3,'class'=>'form-control',
    'required','placeholder'=>'Descrição'])}}
    <br/>
    {{Form::submit('Cadastrar',['class'=>'btn btn-primary'])}}
    {{Form::close()}}
@endsection
