@extends('templates.master')
@section('title', 'PhotoArt - Artista')
@section('contenido')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card d-flex flex-fluid">
            <div class="card-header d-flex flex-fluid"><h5>Galería de: {{ $cuenta->nombre }} {{ $cuenta->apellido }}</h5></div>

            <div class="card-body ">
                
                @if (Auth::user()->user === $cuenta->user)
                <a href="{{ route('artista.publicar', ['user' => $cuenta->user]) }}" class="btn btn-primary mb-3">Añadir Nueva Foto</a>
                <a href="{{ route('artista.baneadas', ['user' => $cuenta->user]) }}" class="btn btn-primary mb-3">Ver mis imágenes baneadas</a>
            @endif
            @if (Auth::user()->perfil_id === 1||Auth::user()->perfil_id === 2)
                <a href="{{ route('admin.home') }}" class="btn btn-primary mb-3">Ver otros artistas</a>
            @endif
                <div class="row row-cols-2">
                    <div class="row">
                        <div class="row">
                            @foreach ($imagenes as $imagen)

                                @if($imagen->baneada === 0)
                                    
                                
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


                                                        <!-- Modal -->
                                                        <div class="modal fade" id="banearModal{{$imagen->id}}" tabindex="-1" aria-labelledby="banearModalLabel{{$imagen->id}}" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="banearModalLabel{{$imagen->id}}">Confirmar</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                <form action="{{ route('artista.banear', ['id' => $imagen->id]) }}" method="POST">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            ¿Desea banear imagen <span class="text-danger fw-bold">{{$imagen->titulo}} </span>?

                                                                            
                                                                                <input type="text" class="form-control" name="motivo" placeholder="Motivo de ban" aria-label="Motivo de ban">
                                                                        
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-danger">Banear</button>
                                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                                                                            
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- este va --}}
                                                    
                                                        


                                                    <!-- Botón Banear -->
                                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#banearModal{{$imagen->id}}">Banear</button>

                                                    
                                                    @endif


                                                @elseif (Auth::user()->perfil_id === 2)
                                                    <!-- Título de la imagen para el artista -->
                                                    <h5 class="card-title">
                                                        @if ($imagen->baneada )
                                                            {{ $imagen->titulo }} <i class="material-icons" style="color:red">error_outline</i>
                                                        @else
                                                            {{ $imagen->titulo }}
                                                        @endif
                                                    </h5>
                                                    <!-- Botones de edición y eliminación -->

                                                    @if (Auth::user()->user === $cuenta->user )


                                                        <div class="btn-group">
                                                            <button class="btn btn-primary btn-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEditar{{ $imagen->id }}" aria-expanded="false" aria-controls="collapseEditar{{ $imagen->id }}">Editar</button>
                                                            
                                                            
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="borrarModal{{$imagen->id}}" tabindex="-1" aria-labelledby="borrarModalLabel{{$imagen->id}}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="borrarModalLabel{{$imagen->id}}">Confirmar</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <form action="{{ route('artista.eliminar', ['id' => $imagen->id]) }}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                ¿Desea eliminar Imagen <span class="text-danger fw-bold">{{$imagen->titulo}} </span>?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-danger">Borrar Imagen</button>
                                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                                                                                
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            {{-- este va --}}
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#borrarModal{{$imagen->id}}">
                                                                
                                                                    Eliminar {{-- input type="text" class="form-control" name="motivo" placeholder="Motivo de ban" aria-label="Motivo de ban"> --}}
                                                                
                                                                {{-- <button type="submit" class="btn btn-primary">Enviar</button> --}}
                                                            </button>    
                                                                
                                                                                                            
                                                            {{-- Original --}}
                                                            {{-- <form action="{{ route('artista.eliminar', ['id' => $imagen->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
                                                            </form> --}}



                                                        </div>
                                                    @endif  
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
                                @endif
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
