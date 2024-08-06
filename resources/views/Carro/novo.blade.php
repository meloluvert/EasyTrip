@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1 class="mt-5 text-center">CADASTRE UM NOVO CARRO</h1>
            </div>
        </div>
         <div class="card-body d-flex justify-content-start">
            
        <img src="{{asset('storage/imgs/carros.png')}}" id="capa" alt="capa" width="400px">
        <form action="{{route('gravaNovoCarro')}}" method="POST" class="w-50">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" 
                       " id="nome" placeholder="Fiesta">
            </div>
            <div class="form-group">
                <label for="placa">Placa do Veículo:</label>
                <input type="text" class="form-control" name="placa" 
                       id="placa" placeholder="AXH895">

                       <div class="form-group">
                <label for="ano">Ano do Carro:</label>
                <input type="number" class="form-control" name="ano" 
                      id="ano" placeholder="2004">
            </div>
            <div class="form-group">
                <label for="link_foto">link foto:</label>
                <input type="text" class="form-control" name="link_foto" 
                       " id="link_foto">
            </div>


            
            <hr>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button onclick="window.location.href='{{route('inicio')}}';" type="button" 
                    class="btn btn-danger btn-sm">Cancelar</button>
        </form>
    </div> 
</div> 
</div>
@endsection