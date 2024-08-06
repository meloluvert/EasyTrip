@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
        <div class="jumbotron">
            <div class="container">
                <h1 class="mt-5 text-center">CADASTRE UM NOVO PASSAGEIRO</h1>
            </div>
        </div>
        <div class="card-body d-flex justify-content-start">

        <img src="{{asset('storage/imgs/passageiro.png')}}" id="capa" alt="capa" width="400px">
        <form action="{{route('gravaNovoPassageiro')}}" method="POST" class="w-50">
            @csrf
           <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" 
                       placeholder="Informe o nome do Passageiro"id="nome">
            </div>
            <hr>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="number" class="form-control" name="telefone" 
                       placeholder="Informe o telefone de contato"id="telefone">
            </div>
            <div class="form-group">
                <label for="link_foto">Link da foto:</label>
                <input type="text" class="form-control" name="link_foto" 
                       placeholder="Iforme o link da foto" id="link_foto">
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