@extends('templates.master')

@section('title', 'Fotos Baneadas - Artista')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Fotos Baneadas</div>
            <div class="card-body">
                <h5 class="card-title">Mis Fotos Baneadas</h5>
                <div class="row">
                    {{-- @foreach ($fotosBaneadas as $foto)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img class="card-img-top" src="{{ $foto->url }}" alt="Imagen Baneada">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $foto->titulo }}</h5>
                                    <p class="card-text">Motivo de Baneo: {{ $foto->motivo_ban }}</p>
                                    <button class="btn btn-primary">Desbanear</button>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
