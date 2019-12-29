<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Produto;
use Session;
use Illuminate\Validation\Rules\Unique;

class ProdutosController extends Controller
{
    public function index(){
        $produto = Produto::all();
        return view('produto.index', array('produtos' => $produto));
    }

    public function show($produto_id){
        $produto = Produto::find($produto_id);
        return view('produto.show', array('produtos' => $produto ));
        }

    public function create(){
        return view('produto.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'codigo' => 'required|unique:produtos|min:3',
            'nome' => 'required|min:3',
            'descricao' => 'required|min:3',
            ]);

        $produto = new Produto();
        $produto ->codigo = $request -> input('codigo');
        $produto ->nome = $request -> input('nome');
        $produto ->descricao = $request ->input('descricao');
        $produto ->imagem = $request ->input('imagem');
        if($produto -> save()){
            return redirect('produtos');
        }
    }

    public function edit($produto_id){
        $produto = Produto::find($produto_id);
        return view('produto.edit', array('produtos' => $produto));
    }


    public function update($produto_id, Request $request){
        $produto = Produto::find($produto_id);
        $this->validate($request, [
            'nome' => 'required|min:3',
            'descricao' => 'required|min:3',
            ]);
            if($request->hasFile('fotoproduto')){
                $imagem = $request->file('fotoproduto');
                $nomearquivo = md5($produto_id) .".". $imagem->getClientOriginalExtension();
                $request->file('fotoproduto')->move(public_path('./img/produtos/'),
                $nomearquivo);
                }

            $produto->nome = $request->input('nome');
            $produto->descricao = $request->input('descricao');
            $produto->save();
            Session::flash('mensagem', 'Produto alterada com sucesso.');
            return redirect()->back();
    }

    public function destroy($produto_id){
        $produto = Produto::find($produto_id);
        $produto->delete();
        Session::flash('mensagem', 'Produto excluído com sucesso.');
        return redirect()->back();

    }

}
