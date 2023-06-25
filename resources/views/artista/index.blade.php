@extends('templates.master')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Panel de: {{ $cuenta->nombre }} {{ $cuenta->apellido }}</div>

            <div class="card-body">
                <h5 class="card-title">Mis Fotos</h5>
                <a href="{{ route('artista.publicar', ['user' => $cuenta->user]) }}" class="btn btn-primary mb-3">Añadir Nueva Foto</a>

                <a href="{{ route('artista.baneadas') }}" class="btn btn-primary mb-3">Ver Fotos Baneadas</a>
                <div class="row">
                    @foreach ($imagenes as $imagen)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                {{-- src="{{ asset('storage/' . $propuesta->documento) }}" --}}
                                <img class="card-img-top" src="{{ asset('storage/'.$imagen->archivo) }}" alt="Card image cap">
                                <div class="card-body">
                                    
                                    <h5 class="card-title">{{ $imagen->titulo }}</h5>
                                    <button class="btn btn-primary">Editar</button>
                                    <button class="btn btn-danger">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
