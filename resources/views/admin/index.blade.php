@extends('templates.master')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Cuentas</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentas as $cuenta)
                        <tr>
                            <td>
                                <a href="{{ route('artista.home', ['user' => $cuenta->user]) }}">{{ $cuenta->nombre }} {{ $cuenta->apellido }}</a>
                            </td>
                            <td>
                                @if ($perfilActual->id === 1 && $cuenta->user !== Auth::user()->user)
                                    <!-- Botones de gestión con funcionalidad de borrado -->
                                    <form action="{{ route('admin.borrar', ['user' => $cuenta->user]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
                <a href="{{ route('crear.cuenta') }}" class="btn btn-primary">Agregar cuenta</a>
            </div>
            <div class="col-md-6">
                <h1>Perfiles</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perfiles as $perfil)
                            <tr>
                                <td>{{ $perfil->id }}</td>
                                <td>{{ $perfil->nombre }}</td>
                                <td>{{ $perfil->cuentas->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
