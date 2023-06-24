@extends('templates.master')

@section('title', 'Iniciar Sesión')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Iniciar Sesión</div>

            <div class="card-body">
                <form>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label text-md-right">Correo Electrónico</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" required autofocus>
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
                            <a class="btn btn-link" href="#">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
