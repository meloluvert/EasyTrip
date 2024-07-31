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
    <div class="card-body">
        <h5 class="card-title" style="text-align: center">Cadastro de Passageiro</h5>
        <div class="row">
            @foreach ($dados as $item)
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top"
                            data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail"
                            alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                                Id: {{ $item->id }} <br>
                                Nome: {{ $item->nome }} <br>
                                Telefone: {{ $item->telefone }} <br>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">
                                        <a href="/passageiro/editar/{{ $item->id }}"
                                            class="btn btn-outline-primary">Editar</a>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/passageiro/apagar/{{ $item->id }}" class="btn btn-outline-danger"
                                        onclick="return confirm('Tem certeza de que deseja remover?');">Deletar</a></button>

                                    
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