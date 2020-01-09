@extends('layouts.home')
@section('title', 'Listagem de produtos')
@section('content')
<h1>Categorias</h1>
@if(Session::has('mensagem'))
<div class="alert alert-success">{{Session::get('mensagem')}}</div>
@endif
<div class="row">
@foreach ($categorias as $categoria)
<div class="col-md-3">
<h4>{{$categoria->nome}}</h4>
@if(file_exists("./img/categorias/" . md5($categoria->id) . ".jpg"))
<a class='thumbnail' href="{{ url('categorias/'.$categoria->id) }}">
{{Html::image(asset("img/categorias/" . md5($categoria->id) .
".jpg"))}}
</a>
@else
<a class='thumbnail' href="{{ url('categorias/'.$categoria->id) }}">
{{ $categoria->nome }}
</a>
@endif
{{Form::open(['route'=>['categorias.destroy',$categoria->id],
'method'=>'DELETE'])}}
<a class='btn btn-primary'
href=" {{url('categorias/'.$categoria->id.'/edit')}} ">Editar</a>
{{Form::submit('Excluir',['class'=>'btn btn-danger'])}}
{{Form::close()}}
</div>
@endforeach
</div>
@endsection
