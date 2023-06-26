@extends('templates.master')

@section('contenido')
    <div class="container">
        <h1>Crear cuenta de Artista</h1>

        <form method="POST" action="{{ route('crear.cuenta') }}">
            @csrf

            <div class="mb-3">
                <label for="user" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="user" name="user">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
            </div>

            <button type="submit" class="btn btn-primary">Crear cuenta</button>
        </form>
    </div>
@endsection
