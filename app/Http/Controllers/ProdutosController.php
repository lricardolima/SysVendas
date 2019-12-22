<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Produto;

class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        return view('produto.index', array('produtos' => $produtos));
    }

    public function show($produto_id){
        $produto = Produto::find($produto_id);
        echo "<pre>";
        print_r($produto);
        echo "</pre>";
        }

    public function create(){
        return view('produto.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'codigo' => 'required|unique:produtos|min:3',
            'nome' => 'required|min:3',
            ]);

        $produto = new Produto();
        $produto ->codigo = $request -> input('codigo');
        $produto ->nome = $request -> input('nome');
        $produto ->descricao = $request ->input('descricao');
        if($produto -> save()){
            return redirect('produtos');
        }
    }
}
