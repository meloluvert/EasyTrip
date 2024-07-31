@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border">
    <div class="card-body">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1 class="mt-5 text-center">CADASTRE UM NOVO PASSAGEIRO PARA ESSA VIAGEM</h1>
                <h6 class="text-center">{{$dados->Nome}}</h6>
            </div>
        </div>
        <form action="{{route('gravaNovoPassageiroViagem')}}" method="POST">
            @csrf
            <input type="hidden" id="passageiro_id" name="passageiro_id" value={{$dados->passageiro_id}}>
            <div class="form-group">
                <label for="autor">Passageiros</label><br />
                <select name="autor">
                        @foreach ($dados as $item)
                            <option value="{{$item->id}}">{{$item->Nome}}</option>
                        @endforeach
                </select>
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