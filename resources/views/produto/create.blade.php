@extends('layouts.home')
@section('title', 'Adicionar um produto')
@section('content')
    <h1>Criar um novo produto</h1>
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
    {{Form::open(['action' => 'ProdutosController@store'])}}
    {{Form::label('codigo', 'Codigo')}}
    {{Form::text('codigo','',['class'=>'form-control','required',
    'placeholder'=>'Codigo'])}}
    {{Form::label('nome', 'Nome')}}
    {{Form::text('nome','',['class'=>'form-control','required',
    'placeholder'=>'Nome'])}}
    {{Form::label('descricao', 'Descrição')}}
    {{Form::textarea('descricao','',['rows'=>3,'class'=>'form-control',
    'required','placeholder'=>'Descrição'])}}
    {{Form::label('fotocategoria', 'Foto')}}
    {{Html::image(asset("img/produto/" . md5($errors->produto_id) .
    ".jpg"))}}
    {{Form::file('fotoproduto',['class'=>'form-control','produto_id'=>'fotoproduto'])}}
    <br/>
    {{Form::submit('Cadastrar',['class'=>'btn btn-default'])}}
    {{Form::close()}}
@endsection
