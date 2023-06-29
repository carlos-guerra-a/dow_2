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
</style>

{{-- Buscador de Artistas --}}
<div class="dropdown artist">
  <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown">Buscar Artistas</button>
  <ul class="dropdown-menu">
      <input class="form-control" id="myInput" type="text" placeholder="Buscar">
      @foreach ($cuentas as $cuenta)
          @if ($cuenta->perfil_id !== 1)
              <li>
                  <a href="{{ route('artista.home', $cuenta->user) }}" class="btn btn-link">{{ $cuenta->nombre }} {{ $cuenta->apellido }}</a>
              </li>
          @endif
      @endforeach
  </ul>
</div>


{{-- Galería Artista Ejemplo --}}
<figure style="max-width: 250px;">
  <img src="{{asset('images/imagen_01.jpg')}}" style="max-width: 100%; height: auto;" />
  <figcaption>El hombre que araña</figcaption>
  <figcaption class="blockquote-footer">Picasso</figcaption>
</figure>

<figure style="max-width: 250px;">
  <img src="{{asset('images/imagen_02.jpg')}}" style="max-width: 100%; height: auto;" />
  <figcaption>No-Name</figcaption>
  <figcaption class="blockquote-footer">Artista</figcaption>
</figure>

<figure style="max-width: 250px;">
  <img src="{{asset('images/imagen_03.jpg')}}" style="max-width: 100%; height: auto;" />
  <figcaption>No-Name</figcaption>
  <figcaption class="blockquote-footer">Artista</figcaption>
</figure>

<figure style="max-width: 250px;">
  <img src="{{asset('images/imagen_04.jpg')}}" style="max-width: 100%; height: auto;" />
  <figcaption>No-Name</figcaption>
  <figcaption class="blockquote-footer">Artista</figcaption>
</figure>

<figure style="max-width: 250px;">
  <img src="{{asset('images/imagen_05.jpg')}}" style="max-width: 100%; height: auto;" />
  <figcaption>No-Name</figcaption>
  <figcaption class="blockquote-footer">Artista</figcaption>
</figure>

<figure style="max-width: 250px;">
  <img src="{{asset('images/imagen_06.jpg')}}" style="max-width: 100%; height: auto;" />
  <figcaption>No-Name</figcaption>
  <figcaption class="blockquote-footer">Artista</figcaption>
</figure>

<figure style="max-width: 250px;">
  <img src="{{asset('images/imagen_07.jpg')}}" style="max-width: 100%; height: auto;" />
  <figcaption>No-Name</figcaption>
  <figcaption class="blockquote-footer">Artista</figcaption>
</figure>

<figure style="max-width: 250px;">
  <img src="{{asset('images/imagen_08.jpg')}}" style="max-width: 100%; height: auto;" />
  <figcaption>No-Name</figcaption>
  <figcaption class="blockquote-footer">Artista</figcaption>
</figure>

<figure style="max-width: 250px;">
  <img src="{{asset('images/imagen_09.jpg')}}" style="max-width: 100%; height: auto;" />
  <figcaption>No-Name</figcaption>
  <figcaption class="blockquote-footer">Artista</figcaption>
</figure>




@endsection

