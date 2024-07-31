@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
    <div class="card-body">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1 class="mt-5 text-center">CADASTRE UM NOVO CARRO</h1>
            </div>
        </div>
        <form action="{{route('gravaNovoCarro')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" 
                       ">
            </div>
            <div class="form-group">
                <label for="placa">Placa do Veículo:</label>
                <input type="number" class="form-control" name="placa" 
                       ">

                       <div class="form-group">
                <label for="ano">Ano do Carro:</label>
                <input type="number" class="form-control" name="ano" 
                      ">
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