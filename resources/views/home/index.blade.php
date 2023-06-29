@extends('templates.master')

@section('contenido')
<style>
  * {
	margin: 0; 
	padding: 0;
}
body {
	background: #ccc; 
	font-family: arial, verdana, tahoma;
}

.artist {
  margin: 20px auto;

}

.accordian {
	width: 805px; height: 320px;
	overflow: hidden;
	
	/* Tiempo para algunos estilos */
	margin: 50px auto;
	box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
	-webkit-box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
	-moz-box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
}

/* Un pequeño truco para evitar parpadeos en algunos navegadores */
.accordian ul {
	width: 2000px;
	/* Esto dará suficiente espacio al último elemento para moverse
	en lugar de caerse/parpadear durante los hover */
}

.accordian li {
	position: relative;
	display: block;
	width: 160px;
	float: left;
	
	border-left: 1px solid #888;
	
	box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
	-webkit-box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
	
	/* Transiciones para dar efecto de animación */
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
	/* Si te desplazas sobre las imágenes ahora, deberías poder ver el acordeón básico */
}

/* Reduce el ancho de los elementos sin hover */
.accordian ul:hover li {width: 40px;}
/* Aplica efectos de hover ahora */
/* Los estilos de hover de LI deben anular los estilos de hover de UL */
.accordian ul li:hover {width: 640px;}


.accordian li img {
	display: block;
}

.gallery {
      display: flex;
      flex-wrap: wrap;
    }

    .gallery img {
      width: 805px; /* Establece el ancho deseado */
      height: 320px; /* Establece la altura deseada */
      object-fit: cover; /* Ajusta la imagen para llenar el espacio sin deformarla */
      margin: 5px; /* Agrega un margen entre las imágenes */
    }
</style>

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

<div class="accordian gallery">
	<ul>
		<li>
      <img src="{{asset('images/imagen_01.jpg')}}">
		</li>
		<li>
      <img src="{{asset('images/imagen_02.jpg')}}">
		</li>
		<li>			
			<img src="{{asset('images/imagen_03.jpg')}}">	
		</li>
		<li>
			<img src="{{asset('images/imagen_04.jpg')}}">
		</li>
		<li>
			<img src="{{asset('images/imagen_05.jpg')}}">
		</li>
	</ul>
</div>

<div class="accordian gallery">
	<ul>
		<li>
      <img src="{{asset('images/imagen_06.jpg')}}">
		</li>
		<li>
      <img src="{{asset('images/imagen_07.jpg')}}">
		</li>
		<li>			
			<img src="{{asset('images/imagen_08.jpg')}}">	
		</li>
		<li>
			<img src="{{asset('images/imagen_09.jpg')}}">
		</li>
    <li>
			<img src="{{asset('images/imagen_10.png')}}">
		</li>
	</ul>
</div>

@endsection

