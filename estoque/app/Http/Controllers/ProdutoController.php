<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;

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
        $produto = Produto::find($id);

        if (empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto/detalhes', ['produto' => $produto]);
    }
    public function novo(Request $request)
    {
        return view('produto/formulario');
    }
    public function adiciona(Request $request)
    {
        $produto = new Produto();

        $produto->nome = $request->input('nome');
        $produto->descricao = $request->input('descricao');

        $produto->valor = $request->input('valor');
        $produto->quantidade = $request->input('quantidade');
        $produto->save();
        return redirect('/')->withInput(Request::only('nome'));

        // return view('produto.adicionado', ['nome' => $nome]);
        // return redirect()
        // ->action(’ProdutoController@lista’)
        // ->withInput(Request::only(’nome’));
    }
    public function listaJson()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }
}
