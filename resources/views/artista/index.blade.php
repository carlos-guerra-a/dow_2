@extends('templates.master')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Panel de: {{ $cuenta->nombre }} {{ $cuenta->apellido }}</div>

            <div class="card-body">
                <h5 class="card-title">Mis Fotos</h5>
                <a href="{{ route('artista.publicar', ['user' => $cuenta->user]) }}" class="btn btn-primary mb-3">Añadir Nueva Foto</a>
                <a href="{{ route('artista.baneadas', ['user' => $cuenta->user]) }}" class="btn btn-primary mb-3">Ver Fotos Baneadas</a>
                <div class="row">
                    @foreach ($imagenes as $imagen)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img class="card-img-top" src="{{ asset('storage/'.$imagen->archivo) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if ($imagen->baneada && Auth::user()->perfil_id === 1)
                                            {{ $imagen->titulo }} (Baneada)
                                        @elseif ($imagen->baneada && Auth::user()->perfil_id === 2)
                                            {{ $imagen->titulo }} <i class="material-icons" style="color:red" >error_outline</i>
                                        @else
                                            {{ $imagen->titulo }}
                                        @endif
                                    </h5>
                                    
                                    @if (Auth::user()->perfil_id === 2)
                                        <!-- Botones de edición y eliminación -->
                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEditar{{ $imagen->id }}" aria-expanded="false" aria-controls="collapseEditar{{ $imagen->id }}">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>

                                        <!-- Collapse de edición -->
                                        <div class="collapse" id="collapseEditar{{ $imagen->id }}">
                                            <div class="card card-body">
                                                <form action="{{ route('artista.editar', ['id' => $imagen->id]) }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" name="nuevo_nombre" placeholder="Escribir nuevo nombre" aria-label="Escribir nuevo nombre">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Cambiar</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
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
