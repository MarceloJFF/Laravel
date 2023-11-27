<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests\ProdutosRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
    public function adiciona(ProdutosRequest $request)
    {


        $params = $request->all();

        $produto = new Produto($params);
        $produto->save();
        return redirect('/')->withInput(Request::only('nome'));

        // return view('produto.adicionado', ['nome' => $nome]);
        // return redirect()
        // ->action(’ProdutoController@lista’)
        // ->withInput(Request::only(’nome’));
    }
    public function remove($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect('/');
    }
    public function listaJson()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }
}
