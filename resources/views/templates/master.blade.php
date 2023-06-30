<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Dependencias de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}


    <title>@yield('title')</title>

    <style>
        *, *:after, *:before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            overflow-x: hidden !important;
            box-sizing: border-box;
            font-family: 'Source Sans Pro', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            outline: none !important;
            color: #fff;
        }

        .border-shape {
            background: #ffbe00 none repeat scroll 0 0;
            color: #fff;
            display: block;
            height: 3px;
            left: 0;
            margin: 20px auto;
            position: relative;
            right: 0;
            text-align: center;
            top: 0;
            width: 80px;
            }

        .border-shape::before {
            background: #ffbe00 none repeat scroll 0 0;
            bottom: 0;
            content: "";
            height: 1px;
            left: 80px;
            margin: 0 auto;
            position: absolute;
            text-align: center;
            top: 1px;
            width: 100px;
        }

        .border-shape::after {
            background: #ffbe00 none repeat scroll 0 0;
            bottom: 0;
            content: "";
            height: 1px;
            margin: 0 auto;
            position: absolute;
            right: 80px;
            text-align: center;
            top: 1px;
            width: 100px;
        }

        


        .container {
            flex: 1;
        }

        footer {
            background-color: #121619;
            color: #fff;
        }

        footer .bottom_content section {
            padding: 1.5rem 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer a {
            margin: 0 20px;
            color: rgba(255, 255, 255, 0.7);
            transition: 0.5s;
        }

        .copyright {
            padding: 0.8em 0;
            background-color: #1e1e1e;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 12px;
        }

        @media (max-width: 820px) {
            .top_header {
                padding: 1rem;
                display: block;
            }

            .top_header section {
                margin: 40px 0;
                align-items: left;
                justify-content: left;
            }

            footer .bottom_content section {
                padding: 1rem;
                display: block;
            }

            footer .bottom_content section a {
                padding: 1rem;
                font-size: 12px;
                margin: 0 5px;
                display: inline-block;
            }
        }
    </style>
</head>
<body class="min-vh-100">

   {{-- Barra de usuario --}}
    <div class="container-fluid">
        <div class="row bg-dark text-white">
            <div class="col-8">
                @if (Auth::check())
                    @if (Auth::user()->perfil_id === 1)
                        <span>Bienvenido </span><a href="{{ route('admin.home') }}">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</a>
                    @elseif (Auth::user()->perfil_id === 2)
                        <a href="{{ route('artista.home', ['user' => Auth::user()->user]) }}">Bienvenido {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</a>
                    @endif
                @endif
            </div>
            <div class="col-2 text-end d-none d-lg-block">
                {{-- Último inicio de sesión: 01/04/2023 a las 18:34
                Último inicio de sesión: {{date('d-m-Y',strtotime(Auth::user()->ultimo_login))}} a las {{date('H:i',strtotime(Auth::user()->ultimo_login))}} --}}
            </div>
            <div class="col-2 text-end d-none d-lg-block">
                {{-- href="{{route('perfiles.logout')}}" --}}
                @if (Auth::check())
                    <a href="{{ route('cuentas.logout') }}" class="text-white">Cerrar Sesión</a>
                @endif
            </div>
        </div>
    </div>

    {{-- Navbar --}}  
    <nav class="navbar bg-body-tertiary" style="background-color: #121619;">
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

    {{-- JC --}}
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

    {{-- Pie de página --}}
    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- FOOTER --}}
    <footer>
        <div class="bottom_content">
            <section>
                <span><i class="fa fa-paint-brush"></i></span>
                <span>PhotoArt</span>
                <a href="{{ route('index')}}">Inicio</a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-telegram"></i></a>
            </section>
        </div>
        <div class="copyright">
            Copyright © 2023 PhotoArt - Todos los derechos reservados 
        </div>
    </footer>

</body>
</html>
