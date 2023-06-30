@extends('templates.master')

@section('contenido')

    @php
    $perf = [1 => 'Administrador',2=>'Artista'];
    @endphp

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Cuentas</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            
                            @if (Auth::user()->perfil_id === 1)
                                <th>Acciones</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentas as $cuenta)
                            @if ($cuenta->perfil_id !== 1 && $cuenta->user !== Auth::user()->user)
                                <tr>
                                    <td>
                                        @if ($cuenta->perfil_id === 1 && $cuenta->user === Auth::user()->user)
                                            {{ $cuenta->nombre }} {{ $cuenta->apellido }}
                                        @else
                                            <a href="{{ route('artista.home', ['user' => $cuenta->user]) }}">{{ $cuenta->nombre }} {{ $cuenta->apellido }}</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $perf[$cuenta->perfil_id] }}
                                    </td>
                                    @if (Auth::user()->perfil_id === 1)
                                        <td>
                                            @if ($perfilActual->id === 1 || ($perfilActual->id !== 1 && $cuenta->user !== Auth::user()->user))
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.editar', ['user' => $cuenta->user]) }}" class="btn btn-primary">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    @if ($cuenta->user !== Auth::user()->user)
                                                        <form action="{{ route('admin.borrar', ['user' => $cuenta->user]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="material-icons">delete</i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            @endif
                                        </td>
                                    @endif    
                                </tr>
                            @endif    
                        @endforeach
                    </tbody>
                </table>

                @if (Auth::user()->perfil_id === 1)
                    <a href="{{ route('crear.cuenta') }}" class="btn btn-primary">Agregar cuenta</a>
                @endif
            </div>
            @if (Auth::user()->perfil_id === 1)
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
            @endif
        </div>
    </div>
@endsection
