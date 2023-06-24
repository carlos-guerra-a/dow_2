@extends('templates.master')

@section('title', 'Home - Artista')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Panel del Artista</div>
            <div class="card-body">
                <h5 class="card-title">Mis Fotos</h5>
                <button class="btn btn-primary mb-3">Añadir Nueva Foto</button>
                <div class="row">
                    {{-- <!-- Aquí se insertarían las fotos con un bucle @foreach -->
                    <!--
                    @foreach ($photos as $photo)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img class="card-img-top" src="{{ $photo->url }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $photo->title }}</h5>
                                    <button class="btn btn-primary">Editar</button>
                                    <button class="btn btn-danger">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    -->
                    <!-- Fin del bucle @foreach --> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
