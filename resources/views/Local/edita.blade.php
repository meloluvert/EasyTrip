@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
    <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid">
            <h1 class="mt-5 text-center">ATUALIZE OS DADOS DO LOCAL</h1>
        </div>
    </div>
    <div class="card-body d-flex justify-content-start">
        <img src="{{asset('storage/imgs/local.png')}}" id="capa" alt="capa" width="400px">
        <form action="/local/{{$dados->id}}" method="POST" class="w-50">

            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" 
                       value="{{$dados->Name}}" id="name">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" name="endereco" 
                       value="{{$dados->Endereco}}" id="endereco">
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