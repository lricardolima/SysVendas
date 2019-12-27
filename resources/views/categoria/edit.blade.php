@extends('layouts.home')
@section('title', 'Alterar a Categoria:'. $categorias->nome)
@section('content')
<h1>Alterar a Categoria: {{ $categorias->nome }}</h1>
@if(count($errors) > 0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@if(Session::has('mensagem'))
<div class="alert alert-success">
{{Session::get('mensagem')}}
</div>
@endif
</div>
@endif
{{Form::open(['route'=>['categorias.update',$categorias->categoria_id],'enctype'=> 'multipart/form-data', 'method'=>'PUT'])}}
{{Form::label('nome', 'Nome',['class'=> 'prettyLabels'])}}
{{Form::text('nome',$categorias->nome,['class'=>'form-control','required','placeholder'=>'Nome'])}}
{{Form::label('descricao', 'Descrição')}}
{{Form::textarea('descricao',$categorias->descricao,['rows'=>3,'class'=>'form-control','required','placeholder'=>'Descrição'])}}
{{Form::label('fotocategoria', 'Foto')}}
{{Form::file('fotocategoria',['class'=>'form-control','categoria_id'=>'fotocategoria'])}}
<br/>
{{Form::submit('Alterar',['class'=>'btn btn-primary'])}}
{{Form::close()}}
@endsection
