<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyTrip</title>
    <link rel="shortcut icon" href="{{asset('storage/imgs/EasyTrip.jpeg')}}" type="image/x-icon">
    @vite(['resources/js/app.js'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    @component('navbar')
    @endcomponent
    <main role="main" class="py-4">
        @hasSection('content')
            @yield('content')
        @endif
    </main>
    
    <footer class="footer mt-auto py-3 navbar-fixed-bottom">
        <div class="container">
            <div class="row">
                    <p class="text-center"><span class="text-muted">Todos os direitos reservados a Lucas, Kauã e Tulio</span></p>
            </div>
          
        </div>
    </footer>
</body>
</html>