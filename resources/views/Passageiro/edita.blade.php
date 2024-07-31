@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
    <div class="card-body">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1 class="mt-5 text-center">ATUALIZE OS DADOS DO PASSAGEIRO</h1>
            </div>
        </div>
        <form action="/passageiro/{{$dados->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="nome" 
                       value="{{$dados->nome}}">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="number" class="form-control" name="telefone" 
                       value="{{$dados->telefone}}">
            </div>
            <button type="submit" class="btn btn-outline-primary btn-sm">Salvar</button>
            <button onclick="window.location.href='{{route('inicio')}}';" type="button" 
                    class="btn btn-outline-danger btn-sm">Cancelar</button>
        </form>
    </div> 
</div> 
</div>
@endsection