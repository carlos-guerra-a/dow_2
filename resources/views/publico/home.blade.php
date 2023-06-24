@extends('templates.master')

@section('title', 'Inicio')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Galería de Fotos
                <form class="form-inline my-2 my-lg-0 float-right">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar por artista" aria-label="Buscar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- <!-- Aquí se insertarían las fotos con un bucle @foreach -->
                    <!--
                    @foreach ($photos as $photo)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img class="card-img-top" src="{{ $photo->url }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $photo->title }}</h5>
                                    <p class="card-text">Artista: {{ $photo->artist }}</p>
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
