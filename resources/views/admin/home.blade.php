@extends('templates.master')

@section('title', 'Home - Administrador')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Panel de Administrador
                <form class="form-inline my-2 my-lg-0 float-right">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar usuario" aria-label="Buscar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
            <div class="card-body">
                <h5 class="card-title">Lista de Usuarios</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <!-- Aquí se insertarían los usuarios con un bucle @foreach -->
                        <!--
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <button class="btn btn-primary">Editar</button>
                                    <button class="btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                        -->
                        <!-- Fin del bucle @foreach --> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
