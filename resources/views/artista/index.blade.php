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
                                <a href="#" data-bs-toggle="modal" data-bs-target="#imagenModal{{ $imagen->id }}">
                                    <img class="card-img-top" src="{{ asset('storage/'.$imagen->archivo) }}" alt="Card image cap">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if ($imagen->baneada && Auth::user()->perfil_id === 2)
                                            {{ $imagen->titulo }}
                                            <i class="material-icons" style="color: red;">error_outline</i>
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

@foreach ($imagenes as $imagen)
    <div class="modal fade" id="imagenModal{{ $imagen->id }}" tabindex="-1" aria-labelledby="imagenModal{{ $imagen->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagenModal{{ $imagen->id }}Label">{{ $imagen->titulo }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/'.$imagen->archivo) }}" class="img-fluid" alt="{{ $imagen->titulo }}">
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
