<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Categoria;
use Illuminate\Validation\Rules\Unique;

class CategoriasController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view ('categoria.index', array('categorias' => $categorias));
        }

    public function show($categoria_id){
        $categoria = Categoria::find($categoria_id);
        echo "<pre>";
        print_r($categoria);
        echo "</pre>";
        }

    public function create(){
        return view('categoria.create');
    }

    public function store(Request $request){

        $this -> validate($request, ['nome' => 'required|Unique:categorias|min:3', 'descricao' => 'required|min:3',]);

        $categorias = new Categoria();
        $categorias -> nome = $request -> input('nome');
        $categorias -> descricao = $request -> input('descricao');
        if($categorias -> save()){
            return redirect('categorias');
        }
    }

    public function edit($categorias_id){
        $categorias_id = Categoria::find($categorias_id);
        return view('categoria.edit', array('categoria' => '$categoria'));
    }

}
