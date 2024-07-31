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
                        <select name="carro">
                            @foreach ($carros as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                        <select name="local_chegada">
                            @foreach ($locais as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                        <select name="local_saida">
                            @foreach ($locais as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                        <select name="motorista">
                            @foreach ($motoristas as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-outline-primary btn-sm">Salvar</button>
                        <button onclick="window.location.href='{{ route('inicio') }}';" type="button"
                            class="btn btn-outline-danger btn-sm">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
