@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
    <div class="jumbotron">
        <div class="container">
            <h1 class="mt-5 text-center">ATUALIZE OS DADOS DO MOTORISTA</h1>
        </div>
    </div>
    <div class="card-body d-flex justify-content-start">
        
        <img src="{{asset('storage/imgs/motorista.png')}}" id="capa" alt="capa" width="400px"> 
        <form action="/motorista/{{$dados->id}}" method="POST" class="w-50">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" 
                       value="{{$dados->nome}}"id="nome">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="number" class="form-control" name="telefone" 
                       value="{{$dados->telefone}}"id="telefone">

                       <div class="form-group">
                <label for="data">Data da Habilitação:</label>
                <input type="date" class="form-control" name="data" 
                       value="{{$dados->data_carteira}}"id="data">
            </div>
            <div class="form-group">ngra, a banda
                <label for="link_foto">link foto:</label>
                <input type="text" class="form-control" name="link_foto" 
                       " id="link_foto" value="{{$dados->link_foto}}">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button onclick="window.location.href='{{route('inicio')}}';" type="button" 
                    class="btn btn-danger btn-sm">Cancelar</button>
        </form>
    </div> 
</div> 
</div>
@endsection