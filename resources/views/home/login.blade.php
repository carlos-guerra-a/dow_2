@extends('templates.master')

@section('title', 'Iniciar Sesión')

@section('contenido')
    <div class="row justify-content-center ">
        <div class="col-md-8  " >
            <div class="card">
                <div class="card-header">Iniciar Sesión</div>
    
                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <p>Por favor solucione los siguientes problemas:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('usuarios.autenticar') }}">
                        @csrf
    
                        <div class="form-group row">
                            <label for="user" class="col-sm-4 col-form-label text-md-right">Nombre de Usuario</label>
                            <div class="col-md-6">
                                <input id="user" type="text" class="form-control" name="user" required autofocus>
                                

                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Recuérdame
                                    </label>
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Iniciar Sesión
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
