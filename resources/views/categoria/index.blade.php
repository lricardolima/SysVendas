@extends('layouts.home')
@section('title', 'Categorias')
@section('content')
<h1>Categorias</h1>
<ul>
@endsection
@foreach ($categorias as $categoria)
<li><a href="http://localhost:8000/categorias/{{ $categoria->categoria_id }}"
>{{ $categoria->titulo }}</a></li>
@endforeach
</ul>
</body>
</html>
