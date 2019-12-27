@extends('layouts.home')
@section('title', $categorias->nome)
@section('content')
<div class="container">
<h1>Categoria {{ $categorias->nome}}</h1>
    <div class="row">
        <div class="col-md-6 col-md-3">
            <ul>
                <li>Nome: {{ $categorias->nome}}</li>
                <li>Adicionado em: {{ date("d/m/Y",
                strtotime($categorias->created_at)) }}</li>
            </ul>
        <p>{{$categorias->descricao}}</p>
        </div>
@if(file_exists("./img/categorias/" . md5($categorias->categoria_id) . ".jpg"))
    <div class="col-md-6 col-md-3">
        <a href="{{asset("img/categorias/" . md5($categorias->categoria_id) . ".jpg")}}"
        class="thumbnail">
        {{Html::image(asset("img/categorias/" . md5($categorias->categoria_id) .
        ".jpg"))}}
        </a>
    </div>
@endif
</div>
<a href="javascript:history.go(-1)">Voltar</a>
@endsection

