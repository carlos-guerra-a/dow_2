@extends('templates.master')

@section('contenido')
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
                @foreach ($cuentas as $cuenta)
                    <tr>
                        <td>{{ $cuenta->nombre }}</td>
                        <td>{{ $cuenta->apellido }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
