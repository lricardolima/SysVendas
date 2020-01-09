@extends('layouts.home')
@section('title', 'Apresentação')
@section('content')
<h1>Apresentação</h1>
@if(Session::has('mensagem'))
<div class="alert alert-success">{{Session::get('mensagem')}}</div>
@endif
<div class="row">
@foreach ($apresentacaos as $apresentacao)
<div class="col-md-3">
<h4>{{ $apresentacao->nome}}</h4>
@if(file_exists("./img/apresentacaos/" . md5($apresentacao->id) . ".jpg"))
<a class='thumbnail' href="{{ url('apresentacaos/'.$apresentacao->id) }}">
{{Html::image(asset("img/apresentacaos/" . md5($apresentacao->id) .
".jpg"))}}
</a>
@else
<a class='thumbnail' href="{{ url('apresentacaos/'.$apresentacao->id) }}">
{{ $apresentacao->nome }}
</a>
@endif
{{Form::open(['route'=>['apresentacaos.destroy',$apresentacao->id],
'method'=>'DELETE'])}}
<a class='btn btn-primary'
href=" {{url('apresentacaos/'.$apresentacao->id.'/edit')}} ">Editar</a>
{{Form::submit('Excluir',['class'=>'btn btn-danger'])}}
{{Form::close()}}
</div>
@endforeach
</div>
@endsection
