<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div id="user">
        <img src="{{asset('storage/imagens/logo.png')}}" id="logo" alt="logo">
    </div>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('inicio')}}">Início</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Motorista</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{route('novoMotorista')}}">Cadastrar Motorista</a>
              <a class="dropdown-item" href="{{route('exibeMotorista')}}">Listar</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Passageiro</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{route('novoPassageiro')}}">Cadastrar Passageiro</a>
              <a class="dropdown-item" href="{{route('exibePassageiro')}}">Listar</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Local</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{route('novoLocal')}}">Cadastrar Local</a>
              <a class="dropdown-item" href="{{route('exibeLocal')}}">Listar</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carro</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{route('novoCarro')}}">Cadastrar Carro</a>
              <a class="dropdown-item" href="{{route('exibeCarro')}}">Listar</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Viagem</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{route('novoViagem')}}">Cadastrar Viagem</a>
              <a class="dropdown-item" href="{{route('pesquisaViagem')}}">Pesquisar Local</a>
              <a class="dropdown-item" href="{{route('exibeViagem')}}">Listar</a>
            </div>
          </li>
      </ul>
      
    </div>
  </nav>