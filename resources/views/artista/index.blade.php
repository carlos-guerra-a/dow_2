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
                                    <h5 class="card-title">{{ $imagen->titulo }}</h5>
                                    
                                    @if ($imagen->baneada)
                                        <!-- Mostrar mensaje de "Baneada" -->
                                        <p class="text-danger">Baneada</p>
                                    @elseif (Auth::user()->perfil_id === 2)
                                        <!-- Botones de edición y eliminación -->
                                        <button class="btn btn-primary">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    @elseif (Auth::user()->perfil_id === 1)
                                        <!-- Botón Banear -->
                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{ $imagen->id }}" aria-expanded="false" aria-controls="collapseExample{{ $imagen->id }}">Banear</button>

                                        <!-- Formulario para el motivo de ban -->
                                        <div class="collapse" id="collapseExample{{ $imagen->id }}">
                                            <div class="card card-body">
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
