@extends('layouts.home')
@section('title', $apresentacaos->nome)
@section('content')
<div class="container">
<h1>Apresentação {{ $apresentacaos->nome}}</h1>
    <div class="row">
        <div class="col-md-6 col-md-3">
            <ul>
                <li>Nome: {{ $apresentacaos->nome}}</li>
                <li>Adicionado em: {{ date("d/m/Y",
                strtotime($apresentacaos->created_at)) }}</li>
            </ul>
        <p>{{$apresentacaos->descricao}}</p>
        </div>
@if(file_exists("./img/apresentacaos/" . md5($apresentacaos->apresentacao_id) . ".jpg"))
    <div class="col-md-6 col-md-3">
        <a href="{{asset("img/apresentacaos/" . md5($apresentacaos->apresentacao_id) . ".jpg")}}"
        class="thumbnail">
        {{Html::image(asset("img/apresentacaos/" . md5($apresentacaos->apresentacao_id) .
        ".jpg"))}}
        </a>
    </div>
@endif
</div>
<a href="javascript:history.go(-1)">Voltar</a>
@endsection
