@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
    <div class="card-body">
        <div class="jumbotron">
            <div class="container">
                <h1 class="mt-5 text-center">ATUALIZE OS DADOS DO CARRO</h1>
            </div>
        </div>
        <form action="/autor/{{$dados->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" 
                       value="{{$dados->Nome}}">
            </div>
            <div class="form-group">
                <label for="placa">Placa do Veículo:</label>
                <input type="number" class="form-control" name="placa" 
                       value="{{$dados->Placa}}">

                       <div class="form-group">
                <label for="ano">Ano do Carro:</label>
                <input type="number" class="form-control" name="ano" 
                       value="{{$dados->Ano}}">
            </div>
            <button type="submit" class="btn btn-outline-primary btn-sm">Salvar</button>
            <button onclick="window.location.href='{{route('inicio')}}';" type="button" 
                    class="btn btn-outline-danger btn-sm">Cancelar</button>
        </form>
    </div> 
</div> 
</div>
@endsection