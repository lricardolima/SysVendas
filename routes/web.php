<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('categorias', 'CategoriasController');
Route::get('adicionar-categorias', 'CategoriasController@create');
Route::get('categorias/{id}/editar', 'CategoriasController@edit');

Route::resource('apresentacaos', 'ApresentacaosController');
Route::get('adicionar-apresentacaos', 'ApresentacaosController@create');
Route::get('apresentacaos/{id}/editar', 'ApresentacaosController@edit');


Route::resource('/produtos', 'ProdutosController');
Route::get('adicionar-produto', 'ProdutosController@create');
Route::get('produtos/{$produto_id}/editar', 'ProdutosController@edit');
