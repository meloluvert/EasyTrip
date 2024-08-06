@extends('layout')
@section('content')
<div class="container py-4">
<div class="card border py-4">
    @if(session()->get('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}
        </div><br />
    @elseif(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
    @endif
    <div class="card-body py-4">
        <h5 class="card-title" style="text-align: center">Cadastro de Viagens</h5>

        <div class="row">
            @foreach ($dados as $item)
                <div class="col-md-5">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top"
                        src="{{ $item->link_foto }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                                Id: {{ $item->id }} <br>
                                Nome: {{ $item->nome }} <br>
                                Dia e hora: {{ $item->horario_saida }} <br>
                                Motorista: {{ $item->motorista }}  <br>
                                Endereço chegada: {{ $item->endereco_chegada }} <br>
                                Endereço saída: {{ $item->endereco_saida }} <br>
                                Carro: {{ $item->carro }} <br>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="">
                                        <a href="/viagem/editar/{{ $item->id }}"
                                            class="btn btn-primary">&#128393;</a>
                                    </button>
                                    <button>
                                        
                                                <a href="/novoPassageiroViagem/{{$item->id}}" class="btn btn-success">+ &#129489;</a>
                                    </button>
                                    <button type="button" class=""><a href="/viagem/apagar/{{ $item->id }}" class="btn btn-danger"
                                        onclick="return confirm('Tem certeza de que deseja remover?');">&#128465;</a></button>
                                        <button><a href="/viagemPassageiros/detalhes/{{$item->id}}" class="btn btn-secondary">&#128065;</a></button>

                                    
                                </div>
                                {{-- <small class="text-muted">9 mins</small> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
           
    </div>
</div>
</div>
@endsection