@extends('templates.master')

@section('contenido')
    <div class="container">
        <h1>Cargar y publicar imagen</h1>

        <form enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>

            <div class="mb-3">
                <label for="archivo" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="archivo" name="archivo">
            </div>

            <button type="submit" class="btn btn-primary">Cargar y publicar</button>
        </form>
    </div>
@endsection
