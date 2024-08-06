@extends('layout')
@section('content')
    <div class="container py-4">
        <div class="card border">
            <div class="card-body">
                <div class="jumbotron">
                    <div class="container">
                        <h1 class="mt-5 text-center">ATUALIZE OS DADOS DA VIAGEM</h1>
                    </div>
                </div>
                <form action="/viagem/{{ $dados->id }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" name="nome" value="{{ $dados->nome }}">
                    </div>
                    <div class="form-group">
                        <label for="telefone">data-hr:</label>
                        <input type="datetime" class="form-control" name="hr" value="{{ $dados->horario_saida }}">

                        <div class="form-group">

                        </div>
                        <label for="carro">carro:</label>
                        <select name="carro" id="carro">
                            @foreach ($carros as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                        <label for="local_chegada">Local da chegada:</label>
                        <select name="local_chegada" id="local_chegada">
                            @foreach ($locais as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                        <label for="local_saida">Local da saída:</label>
                        <select name="local_saida" id="local_saida">
                            @foreach ($locais as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                        <label for="motorista">Motorista:</label>
                        <select name="motorista" id="motorista">
                            @foreach ($motoristas as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="link_foto">link foto:</label>
                            <input type="text" class="form-control" name="link_foto" 
                                   " id="link_foto" value="{{$dados->link_foto}}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <button onclick="window.location.href='{{ route('inicio') }}';" type="button"
                            class="btn btn-danger btn-sm">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
