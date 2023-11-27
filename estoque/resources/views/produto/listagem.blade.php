@extends('layouts.principal')


@section('conteudo')

@if(empty($produtos))
<div class="alert alert-danger">
    Você não tem nenhum produto cadastrado.
</div>
@else
<h1>Listagem de produtos</h1>


<table class=" table  table-bordered  table-hover">
    @foreach ($produtos as $p)
    <tr class="{{$p->quantidade <= 1? 'bg-danger ' :''}}">
        <td>
            {{$p->nome }}
        </td>
        <td>
            {{$p->valor }}
        </td>
        <td>
            {{$p->descricao or 'nenhuma descricao informada'}}
        </td>
        <td>
            {{$p->quantidade }}
        </td>
        <td>
            <a href="{{route('detalhes',['id'=> $p->id])}}">Visualizar</span></a>
        </td>
    </tr>
    @endforeach

</table>
@endif
<h4>
    <span class="label label-danger  pull-right">
        Um ou menos itens no estoque
    </span>
</h4>
<div class="alert alert-success">
    <strong>Sucesso!</strong>
    O produto {{ old('nome') }} foi adicionado.
</div>
@endsection('conteudo')
