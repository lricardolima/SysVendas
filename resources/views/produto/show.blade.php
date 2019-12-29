@extends('layouts.home')
@section('title', $produto->nome)
@section('content')
<div class="container">
<h1>Produtos {{ $produto->nome}}</h1>
    <div class="row">
        <div class="col-md-6 col-md-3">
            <ul>
                <li>Codigo: {{ $produto->codigo }}</li>
                <li>Nome: {{ $produto->nome}}</li>
                <li>Adicionado em: {{ date("d/m/Y",
                strtotime($produto->created_at)) }}</li>
            </ul>
        <p>{{$produto->descricao}}</p>
        </div>
@if(file_exists("./img/produtos/" . md5($produto->produto_id) . ".jpg"))
    <div class="col-md-6 col-md-3">
        <a href="{{asset("img/produtos/" . md5($produto->produto_id) . ".jpg")}}"
        class="thumbnail">
        {{Html::image(asset("img/produto/" . md5($produto->produto_id) .
        ".jpg"))}}
        </a>
    </div>
@endif
</div>
<a href="javascript:history.go(-1)">Voltar</a>
@endsection
