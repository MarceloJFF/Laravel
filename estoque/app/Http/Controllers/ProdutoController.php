<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function listar(){
        $produtos = DB::select('select* from produtos');

        $html = '<h1> Listagem produtos</h1>';
        $html .= '<ul>';
        foreach($produtos as $p){
            $html .= '<li> Nome: '. $p->nome .',
                Descrição: '. $p->descricao .'</li>';
        }
        $html .= '</ul>';

        return $html;
    }
}
