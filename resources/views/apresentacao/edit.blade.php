@extends('layouts.home')
@section('title', 'Alterar a Apresentação:'. $apresentacaos->nome)
@section('content')
<h1>Alterar a Apresentação: {{ $apresentacaos->nome }}</h1>
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
{{Form::open(['route'=>['apresentacaos.update',$apresentacaos->apresentacao_id],'enctype'=> 'multipart/form-data', 'method'=>'PUT'])}}
{{Form::label('nome', 'Nome',['class'=> 'prettyLabels'])}}
{{Form::text('nome',$apresentacaos->nome,['class'=>'form-control','required','placeholder'=>'Nome'])}}
{{Form::label('descricao', 'Descrição')}}
{{Form::textarea('descricao',$apresentacaos->descricao,['rows'=>3,'class'=>'form-control','required','placeholder'=>'Descrição'])}}
{{Form::label('fotoapresentacao', 'Foto')}}
{{Form::file('fotoapresentacao',['class'=>'form-control','apresentacao_id'=>'fotoapresentacao'])}}
<br/>
{{Form::submit('Alterar',['class'=>'btn btn-primary'])}}
{{Form::close()}}
@endsection
