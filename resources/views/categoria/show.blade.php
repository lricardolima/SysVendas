@extends('layouts.home')
@section('title', $categoria->titulo)
@section('content')
<h1>Categoria {{ $categoria->titulo }}</h1>
<ul>
<li>Referência: {{$categora->referencia}}</li>
<li>Preço: {{$categoria->preco}}</li>
<li>Adicionado em: {{$categoria->created_at}}</li>
</ul>
<p>{{$categoria->descricao}}</p>
<a href="javascript:history.go(-1)">Voltar</a>
@endsection
