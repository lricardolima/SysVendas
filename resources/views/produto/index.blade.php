@extends('layouts.home')
@section('title', 'Listagem de produtos')
@section('content')
<h1>Produtos</h1>
@if(Session::has('mensagem'))
<div class="alert alert-success">{{Session::get('mensagem')}}</div>
@endif
<div class="row">
@foreach ($produtos as $produto)
<div class="col-md-3">
<h4>{{$produto->nome}}</h4>
@if(file_exists("./img/produtos/" . md5($produto->produto_id) . ".jpg"))
<a class='thumbnail' href="{{ url('produtos/'.$produto->produto_id) }}">
{{Html::image(asset("img/produtos/" . md5($produto->produto_id) .
".jpg"))}}
</a>
@else
<a class='thumbnail' href="{{ url('produtos/'.$produto->produto_id) }}">
{{ $produto->nome }}
</a>
@endif
{{Form::open(['route'=>['produtos.destroy',$produto->produto_id],
'method'=>'DELETE'])}}
<a class='btn btn-primary'
href=" {{url('produtos/'.$pruduto->produto_id.'/edit')}} ">Editar</a>
{{Form::submit('Excluir',['class'=>'btn btn-danger'])}}
{{Form::close()}}
</div>
@endforeach
</div>
@endsection
