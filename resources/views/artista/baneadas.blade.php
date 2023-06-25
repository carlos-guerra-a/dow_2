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
                    <div class="row">
                        @foreach ($imagenes as $imagen)
                            @if ($imagen->baneada == 1)
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="{{ asset('storage/'.$imagen->archivo) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $imagen->titulo }}</h5>
                                            <p>Motivo de baneo: {{ $imagen->motivo_ban }}</p>
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
@endsection
