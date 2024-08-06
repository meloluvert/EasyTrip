@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
    <div class="card-body">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1 class="mt-5 text-center">CADASTRE UM NOVO AUTOR PARA ESTE LIVRO</h1>
                <h6 class="text-center">{{$dados->nome}}</h6>
            </div>
        </div>
        <form action="{{route('gravaNovoPassageiroViagem')}}" method="POST">
            @csrf
            <input type="hidden" id="" name="viagem_id" value={{$dados->viagem_id}}>
            <div class="form-group">
                <label for="passageiro">Passageiros</label><br />
                <select name="passageiro">
                        @foreach ($dados as $item)
                            <option value="{{$item->id}}">{{$item->nome}}</option>
                        @endforeach
                </select>
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