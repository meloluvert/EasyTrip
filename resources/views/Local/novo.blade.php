@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1 class="mt-5 text-center">CADASTRE UM NOVO LOCAL</h1>
            </div>
        </div>
        <div class="card-body d-flex justify-content-start">

        <img src="{{asset('storage/imgs/local.png')}}" id="capa" alt="capa" width="400px">
        <form action="{{route('gravaNovoLocal')}}" method="POST" class="w-50">
            @csrf
             <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" 
                       placeholder="Informe o nome do motorista" id="nome">
            </div>
            <hr>
            <div class="form-group">
                <label for="ano">Endereço:</label>
                <input type="text" class="form-control" name="endereco" 
                       placeholder="Informe o telefone do motorista" id="ano">
            </div>
            <div class="form-group">
                <label for="link_foto">Link foto:</label>
                <input type="text" class="form-control" name="link_foto" 
                       placeholder="Informe o telefone do motorista" id="link_foto">
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