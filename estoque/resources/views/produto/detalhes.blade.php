@extends('layouts.principal')


@section('conteudo')
<div class="container">
    <h1>Detalhes do produto: {{$produto->nome}}</h1>
    <ul>
        <li> <b>Valor: </b> R$ {{$produto->valor}}</li>
        <li> <b>Descrição: </b> R$ {{$produto->descricao}}</li>
        <li> <b>Quantidade em estoque: </b> R$ {{$produto->quantidade}}</li>
    </ul>
</div>
@endsection('conteudo')
