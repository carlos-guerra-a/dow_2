@extends('templates.master')
@section('title', 'PhotoArt')

@section('contenido')

{{-- CSS --}}
<style>

@import url('https://fonts.googleapis.com/css2?family=MuseoModerno&family=Rampart+One&family=Reenie+Beanie&family=Roboto:wght@100&display=swap');


body {
 background:url('https://i.imgur.com/ue8n1S3.png');
  color:#22f;
}
figure {
  border:solid 5px #fff;
  box-shadow:0px 0px 10px #000;
  display:inline-block;
  background:#fff;
  border-radius:2px;
  transform:rotate(-10deg);
  transition:transform .8s;
}
figcaption {
  text-align:center;
  font-size:20px;
}

figure:nth-child(2) {
  transform:rotate(23deg);
  transition:transform .2s;
}

figure:nth-child(3) {
  transform:rotate(-2deg);
  transition:transform .2s;
}

figure:hover {
  transform:rotate(0deg);
  transition:transform .2s;
}

.artist-cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.artist-card {
    width: 300px;
    border: solid 5px #fff;
    box-shadow: 0px 0px 10px #000;
    background: #fff;
    border-radius: 2px;
    transform: rotate(-10deg);
    transition: transform .8s;
}

.artist-card:hover {
    transform: rotate(0deg);
    transition: transform .2s;
}

.artist-card img {
    max-width: 100%;
    height: auto;
}

.artist-card .artist-name {
    text-align: center;
    font-size: 20px;
}

.modal-dialog-centered.modal-xl {
  max-width: 90%;
}

.modal-body {
  text-align: center;
}

.modal-body img {
  max-width: 100%;
  height: auto;
}
</style>

{{-- Buscador de Artistas --}}
{{-- <div class="dropdown artist">
    <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown">Visitar Perfil de Artista</button>
    <ul class="dropdown-menu">
        <li>
            <a href="{{ route('artista.listado') }}" class="btn btn-link">Todos los Artistas</a>
        </li>
        @foreach ($cuentas as $cuenta)
            @if ($cuenta->perfil_id === 2)
                <li>
                    <a href="{{ route('artista.home', ['user' => $cuenta->user]) }}" class="btn btn-link">{{ $cuenta->nombre }} {{ $cuenta->apellido }}</a>
                </li>
            @endif
        @endforeach
    </ul>
</div> --}}

{{--combo --}}
<div class="form-group">
    <label for="artista-select" style="color: black; font-weight: bold;" ><h4>Seleccionar Artista:</h4></label>
    <select class="form-control" id="artista-select">
        <option value="">Todos los Artistas</option>
        @foreach ($cuentas as $cuenta)
            @if ($cuenta->perfil_id === 2)
                <option value="{{ $cuenta->user }}">{{ $cuenta->nombre }} {{ $cuenta->apellido }}</option>
            @endif
        @endforeach
    </select>
</div>

{{-- galeria --}}
<div class="artist-cards">
    @foreach ($imagenes as $imagen)
        @if ($imagen->baneada === 0)
            <figure style="max-width: 250px;" class="artist-card" data-artista="{{ $imagen->cuenta->user }}">
                <a href="#" data-bs-toggle="modal" data-bs-target="#imagenModal{{ $imagen->id }}">
                    <img src="{{ asset('storage/'.$imagen->archivo) }}" alt="Imagen" style="max-width: 100%; height: auto;">
                </a>
                <figcaption>{{ $imagen->titulo}}</figcaption>
                <p>


                    
                </p>
                <figcaption class="blockquote-footer">{{ $imagen->cuenta->nombre }} {{ $imagen->cuenta->apellido }}</figcaption>
            </figure>
        @endif
    @endforeach
</div>

{{-- Modal para mostrar imágenes ampliadas --}}
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

{{-- javaScript --}}
<script>
    document.getElementById('artista-select').addEventListener('change', function() {
        var selectedArtista = this.value;

        var artistCards = document.getElementsByClassName('artist-card');
        for (var i = 0; i < artistCards.length; i++) {
            var artistCard = artistCards[i];
            var artista = artistCard.getAttribute('data-artista');

            if (selectedArtista === '' || artista === selectedArtista) {
                artistCard.style.display = 'block';
            } else {
                artistCard.style.display = 'none';
            }
        }
    });
</script>

@endsection
