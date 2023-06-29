<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>

   {{-- Barra de usuario --}}
    <div class="container-fluid">
        <div class="row bg-dark text-white">
            <div class="col-8">
                @if (Auth::check())
                    Bienvenido {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                @endif
            </div>
            <div class="col-2 text-end d-none d-lg-block">
                {{-- Último inicio de sesión: 01/04/2023 a las 18:34
                Último inicio de sesión: {{date('d-m-Y',strtotime(Auth::user()->ultimo_login))}} a las {{date('H:i',strtotime(Auth::user()->ultimo_login))}} --}}
            </div>
            <div class="col-2 text-end d-none d-lg-block">
                {{-- href="{{route('perfiles.logout')}}" --}}
                @if (Auth::check())
                    <a href="#" class="text-white">Cerrar Sesión</a>
                @endif
            </div>
        </div>
    </div>


    {{-- Navbar --}}  
    <nav class="navbar bg-body-tertiary" style="background-color: #f1e7b0;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{asset('images/logo.ico')}}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                PhotoArt
            </a>
            <div>
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="btn btn-primary me-2">Iniciar Sesión</a>
                    <a href="{{ route('crear.cuenta') }}" class="btn btn-success">Crear cuenta de artista</a>
                @endif
            </div>
        </div>
    </nav>

        
    
    {{-- Contenido principal --}}
    <div class="container">
        @yield('contenido')
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".dropdown-menu li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>
