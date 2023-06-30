@extends('templates.master')

@section('contenido')

{{-- CSS --}}
<style>
@import url(https://fonts.googleapis.com/css?family=Reenie+Beanie);

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

{{-- Combobox de Artistas --}}
<div class="form-group">
    <label for="artista-select">Seleccionar Artista:</label>
    <select class="form-control" id="artista-select">
        <option value="">Todos los Artistas</option>
        @foreach ($cuentas as $cuenta)
            @if ($cuenta->perfil_id === 2)
                <option value="{{ $cuenta->user }}">{{ $cuenta->nombre }} {{ $cuenta->apellido }}</option>
            @endif
        @endforeach
    </select>
</div>

{{-- Galería de Fotos --}}
<div class="artist-cards">
    @foreach ($imagenes as $imagen)
        <figure style="max-width: 250px;" class="artist-card" data-artista="{{ $imagen->cuenta->user }}">
            <img src="{{ asset('storage/'.$imagen->archivo) }}" alt="Imagen" style="max-width: 100%; height: auto;">
            <figcaption>{{ $imagen->titulo}}</figcaption>
            <figcaption class="blockquote-footer">{{ $imagen->cuenta->nombre }} {{ $imagen->cuenta->apellido }}</figcaption>
        </figure>
    @endforeach
</div>

{{-- JavaScript --}}
<script>
    // Filtrar fotos al seleccionar un artista en el combobox
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
