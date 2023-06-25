@extends('templates.master')

@section('contenido')
    <div class="container">
        <h1>Perfiles existentes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cuentas as $cuenta)
                    <tr>
                        <td>{{ $cuenta->nombre }}</td>
                        <td>{{ $cuenta->apellido }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container">
        <h1>Perfiles existentes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perfiles as $perfil)
                    <tr>
                        <td>{{ $perfil->id }}</td>
                        <td>{{ $perfil->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
