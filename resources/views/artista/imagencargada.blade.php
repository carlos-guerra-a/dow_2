@extends('templates.master')

@section('contenido')
    <div class="container">
        <h1>Archivo cargado correctamente</h1>
        <p>El archivo se ha cargado correctamente.</p>

        <a href="{{ route('artista.home', ['user' => $user]) }}" class="btn btn-primary">Volver al perfil</a>
    </div>
@endsection