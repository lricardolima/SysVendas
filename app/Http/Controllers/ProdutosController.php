<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Produto;

class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        echo "<pre>";
        print_r($produtos);
        echo "<pre>";
    }

    public function show($produto_id){
        $produto = Produto::find($produto_id);
        echo "<pre>";
        print_r($produto);
        echo "</pre>";
        }
}
