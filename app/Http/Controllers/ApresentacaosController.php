<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Apresentacao;
use Illuminate\Validation\Rules\Unique;
use Session;

class ApresentacaosController extends Controller
{
    public function index(){
        $apresentacao = Apresentacao::all();
        return view ('apresentacao.index', array('apresentacaos' => $apresentacao));
        }

    public function show($apresentacao_id){
        $apresentacao = Apresentacao::find($apresentacao_id);
        return view ('apresentacao.show', array('apresentacaos' => $apresentacao));
        }

    public function create(){
        return view('apresentacao.create');
    }

    public function store(Request $request){

        $this -> validate($request, ['nome' => 'required|Unique:apresentacaos|min:3', 'descricao' => 'required|min:3',]);

        $apresentacao = new Apresentacao();
        $apresentacao -> nome = $request -> input('nome');
        $apresentacao -> descricao = $request -> input('descricao');
        if($apresentacao -> save()){
            return redirect('apresentacaos');
        }
    }

    public function edit($apresentacao_id){
        $apresentacao = Apresentacao::find($apresentacao_id);
        return view('apresentacao.edit', array('apresentacaos' => $apresentacao));
    }


    public function update($apresentacao_id, Request $request){
        $apresentacao = Apresentacao::find($apresentacao_id);
        $this->validate($request, [
            'nome' => 'required|min:3',
            'descricao' => 'required|min:3',
            ]);
            if($request->hasFile('fotoapresentacao')){
                $imagem = $request->file('fotoapresentacao');
                $nomearquivo = md5($apresentacao_id) .".". $imagem->getClientOriginalExtension();
                $request->file('fotoapresentacao')->move(public_path('./img/apresentacaos/'),
                $nomearquivo);
                }

            $apresentacao->nome = $request->input('nome');
            $apresentacao->descricao = $request->input('descricao');
            $apresentacao->save();
            Session::flash('mensagem', 'Apresentação alterada com sucesso.');
            return redirect()->back();
    }

    public function destroy($apresentacao_id){
        $apresentacao = Apresentacao::find($apresentacao_id);
        $apresentacao->delete();
        Session::flash('mensagem', 'Apresentação excluída com sucesso.');
        return redirect()->back();

    }

}
