@extends('layout')
@section('content')
<div class="container-fluid py-4 text-center">
    <div class="jumbotron-fluid py-4">
      <h1 class="display-3">EasyTrip</h1>
      <p>Faça o registro das suas viagens</p>
    </div>
  </div>

  <div class="container">
    <div class="row d-flex justify-content-center">
         <img src="{{asset('storage/imgs/EasyTrip.jpeg')}}" id="capa" alt="capa" style="width: 500px"> 
    </div>
  </div>

@endsection