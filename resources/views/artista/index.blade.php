@extends('templates.master')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">Panel de: {{ $cuenta->nombre }} {{ $cuenta->apellido }}</div>

            <div class="card-body ">
                <h5 class="card-title">Mis Fotos</h5>
                <a href="{{ route('artista.publicar', ['user' => $cuenta->user]) }}" class="btn btn-primary mb-3">Añadir Nueva Foto</a>
                <a href="{{ route('artista.baneadas', ['user' => $cuenta->user]) }}" class="btn btn-primary mb-3">Ver Fotos Baneadas</a>
                <a href="{{ route('admin.home') }}" class="btn btn-primary mb-3">Listar artistas</a>
                <div class="row row-cols-2">
                    <div class="row">
                        <div class="row">
                            @foreach ($imagenes as $imagen)
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="card">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#imagenModal{{ $imagen->id }}">
                                            <img class="card-img-top" src="{{ asset('storage/'.$imagen->archivo) }}" alt="Card image cap">
                                        </a>
                                        <div class="card-body d-flex flex-column">
                                            @if (Auth::user()->perfil_id === 1)
                                                <!-- Título de la imagen -->
                                                <h5 class="card-title">{{ $imagen->titulo }}</h5>
                                                <!-- Botón Banear o Desbanear -->
                                                @if ($imagen->baneada)
                                                    <form action="{{ route('artista.banear', ['id' => $imagen->id]) }}" method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-secondary btn-block">Desbanear Imagen</button>
                                                    </form>
                                                @else
                                                   <!-- Botón Banear -->
                                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBanear{{ $imagen->id }}" aria-expanded="false" aria-controls="collapseBanear{{ $imagen->id }}">Banear</button>

                                                    <!-- Formulario para el motivo de ban -->
                                                    <div class="collapse" id="collapseBanear{{ $imagen->id }}">
                                                        <div class="card card-body  d-flex flex-column">
                                                            <form action="{{ route('artista.banear', ['id' => $imagen->id]) }}" method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control" name="motivo" placeholder="Motivo de ban" aria-label="Motivo de ban">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Enviar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif
                                            @elseif (Auth::user()->perfil_id === 2)
                                                <!-- Título de la imagen para el artista -->
                                                <h5 class="card-title">
                                                    @if ($imagen->baneada)
                                                        {{ $imagen->titulo }} <i class="material-icons" style="color:red">error_outline</i>
                                                    @else
                                                        {{ $imagen->titulo }}
                                                    @endif
                                                </h5>
                                                <!-- Botones de edición y eliminación -->
                                                <div class="btn-group">
                                                    <button class="btn btn-primary btn-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEditar{{ $imagen->id }}" aria-expanded="false" aria-controls="collapseEditar{{ $imagen->id }}">Editar</button>
                                                    <form action="{{ route('artista.eliminar', ['id' => $imagen->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
                                                    </form>
                                                </div>
                                                <!-- Collapse de edición -->
                                                <div class="collapse" id="collapseEditar{{ $imagen->id }}">
                                                    <div class="card card-body  d-flex flex-column">
                                                        <form action="{{ route('artista.editar', ['id' => $imagen->id]) }}" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" name="nuevo_nombre" placeholder="Escribir nuevo nombre" aria-label="Escribir nuevo nombre">
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <button type="submit" class="btn btn-primary">Cambiar</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseEditar{{ $imagen->id }}" aria-expanded="false" aria-controls="collapseEditar{{ $imagen->id }}">Cancelar</button>
                                                            </div>
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
