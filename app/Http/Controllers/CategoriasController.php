<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Categoria;
use Illuminate\Validation\Rules\Unique;
use Session;

class CategoriasController extends Controller
{
    public function index(){
        $categoria = Categoria::all();
        return view ('categoria.index', array('categorias' => $categoria));
        }

    public function show($categoria_id){
        $categoria = Categoria::find($categoria_id);
        return view ('categoria.show', array('categorias' => $categoria));
        }

    public function create(){
        return view('categoria.create');
    }

    public function store(Request $request){

        $this -> validate($request, ['nome' => 'required|Unique:categorias|min:3', 'descricao' => 'required|min:3',]);

        $categoria = new Categoria();
        $categoria -> nome = $request -> input('nome');
        $categoria -> descricao = $request -> input('descricao');
        if($categoria -> save()){
            return redirect('categorias');
        }
    }

    public function edit($categoria_id){
        $categoria = Categoria::find($categoria_id);
        return view('categoria.edit', array('categorias' => $categoria));
    }


    public function update($categoria_id, Request $request){
        $categoria = Categoria::find($categoria_id);
        $this->validate($request, [
            'nome' => 'required|min:3',
            'descricao' => 'required|min:3',
            ]);
            if($request->hasFile('fotocategoria')){
                $imagem = $request->file('fotocategoria');
                $nomearquivo = md5($categoria_id) .".". $imagem->getClientOriginalExtension();
                $request->file('fotocategoria')->move(public_path('./img/categorias/'),
                $nomearquivo);
                }

            $categoria->nome = $request->input('nome');
            $categoria->descricao = $request->input('descricao');
            $categoria->save();
            Session::flash('mensagem', 'Categoria alterada com sucesso.');
            return redirect()->back();
    }

    public function destroy($categoria_id){
        $categoria = Categoria::find($categoria_id);
        $categoria->delete();
        Session::flash('mensagem', 'Categoria excluída com sucesso.');
        return redirect()->back();

    }



}
