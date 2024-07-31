@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
    <div class="card-body">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1 class="mt-5 text-center">ATUALIZE OS DADOS DO LOCAL</h1>
            </div>
        </div>
        <form action="/local/{{$dados->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" 
                       value="{{$dados->Name}}">
            </div>
            <div class="form-group">
                <label for="telefone">Endereço:</label>
                <input type="text" class="form-control" name="endereco" 
                       value="{{$dados->Endereco}}">
            </div>
            <button type="submit" class="btn btn-outline-primary btn-sm">Salvar</button>
            <button onclick="window.location.href='{{route('inicio')}}';" type="button" 
                    class="btn btn-outline-danger btn-sm">Cancelar</button>
        </form>
    </div> 
</div> 
</div>
@endsection