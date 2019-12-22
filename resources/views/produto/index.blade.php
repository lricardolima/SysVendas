@extends('layouts.home')
@section('title', 'Listagem de produtos')
@section('content')
<h1>Produtos</h1>
<ul>
@endsection
@foreach ($produtos as $produto)
<li><a href="http://localhost:8000/produtos/{{ $produto->produto_id }}"
>{{ $produto->titulo }}</a></li>
@endforeach
</ul>
</body>
</html>
