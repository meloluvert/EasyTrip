@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
    <div class="card-body">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1 class="mt-5 text-center">CADASTRE UM NOVO MOTORISTA</h1>
            </div>
        </div>
        <form action="{{route('gravaNovoMotorista')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" 
                       placeholder="Informe o nome do motorista">
            </div>
            <hr>
            <div class="form-group">
                <label for="ano">Telefone:</label>
                <input type="number" class="form-control" name="telefone" 
                       placeholder="Informe o telefone do motorista">
            </div>

            <div class="form-group">
                <label for="data">Data da Habilitação:</label>
                <input type="date" class="form-control" name="data" 
                       placeholder="Informe a data da primeira habilitação">
            </div>
            <hr>
            <button type="submit" class="btn btn-outline-primary btn-sm">Salvar</button>
            <button onclick="window.location.href='{{route('inicio')}}';" type="button" 
                    class="btn btn-outline-danger btn-sm">Cancelar</button>
        </form>
    </div> 
</div> 
</div>
@endsection