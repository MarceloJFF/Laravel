<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function listar()
    {
        $produtos = DB::select('select* from produtos');

        return view('produto/listagem', compact('produtos'));
    }
    public function mostra(Request $request)
    {
        $id = $request->route('id');
        // $id = Request::input('id');
        $produto = DB::select('select* from produtos where id = ?', [$id]);
        if (empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto/detalhes', ['produto' => $produto[0]]);
    }
    public function novo(Request $request)
    {
        return view('produto/formulario');
    }
    public function adiciona(Request $request)
    {
        $nome = $request->input('nome');
        $descricao = $request->input('descricao');

        $valor = $request->input('valor');

        $quantidade = $request->input('quantidade');


        DB::insert('insert into produtos(nome,quantidade,valor,descricao) values(?,?,?,?)', [$nome, $quantidade, $valor, $descricao]);

        $produtos = DB::select('select* from produtos');

        return redirect('/')->withInput(Request::only('nome'));

        // return view('produto.adicionado', ['nome' => $nome]);
        // return redirect()
        // ->action(’ProdutoController@lista’)
        // ->withInput(Request::only(’nome’));
    }
    public function listaJson()
    {
        $produtos = DB::select('select * from produtos');
        return response()->json($produtos);
    }
}
