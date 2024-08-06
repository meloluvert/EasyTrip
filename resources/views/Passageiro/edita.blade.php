@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
    <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid">
            <h1 class="mt-5 text-center">ATUALIZE OS DADOS DO PASSAGEIRO</h1>
        </div>
    </div>
    <div class="card-body  d-flex justify-content-start">
       
        <img src="{{asset('storage/imgs/motorista.png')}}" id="capa" alt="capa" width="400px"> 

        <form action="/passageiro/{{$dados->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="nome" 
                       value="{{$dados->nome}}" id="name">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="number" class="form-control" name="telefone" 
                       value="{{$dados->telefone}}"id="telefone">
            </div>
            <div class="form-group">
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