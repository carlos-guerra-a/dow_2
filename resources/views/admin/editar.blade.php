@extends('templates.master')
@section('title', 'PhotoArt - Editar Artista')

@section('contenido')
    <div class="container">
        <h1>Editar Cuenta</h1>
        <form method="POST" action="{{ route('admin.actualizar', ['user' => $cuenta->user]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user">Usuario</label>
                <input type="text" class="form-control" id="user" name="user" value="{{ $cuenta->user }}" disabled>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cuenta->nombre }}">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $cuenta->apellido }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('admin.home') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
@endsection
