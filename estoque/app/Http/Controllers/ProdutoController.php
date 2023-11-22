<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function listar()
    {
        $produtos = DB::select('select* from produtos');

        return view('listagem', compact('produtos'));
    }
}
