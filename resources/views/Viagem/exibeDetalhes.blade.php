@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border py-4">
    <div class="card-body">
        <h5 class="card-title" style="text-align: center">Cadastro de Viagem</h5>
        <h6 class="text-center">{{$dados->nome}}</h6>
            <table class="table table-ordered table-hover">
                <thead>
                    <tr>
                        <th>Nome do Local</th>
                        <th style="text-align:center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dados as $item)
                    <tr>
                        <td>{{ $item->nome }}</td>
                        <td style="text-align:center">
                            <a href="/viagemPassageiros/apagar/{{$dados->viagem_id}}/{{$item->id}}" class="btn btn-danger" 
                               onclick="return confirm('Tem certeza de que deseja remover?');">Deletar</a>
                        </td>
                    </tr>  
                    @empty 
                        <tr>
                            <td style="text-align:center" colspan="4">Não há passageiros cadastrados para esta viagem</td>                            
                        </tr>
                    @endforelse
                </tbody>
            </table>
    </div>
</div>
    <div class="card-footer">
        <a href="/viagems" class="btn btn-info btn-sm" role="button">Voltar</a>
    </div>
</div>
@endsection