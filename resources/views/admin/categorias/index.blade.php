@extends('adminlte::page')

@section('title', 'Tablero')

@section('content_header')
    <h1>Lista de Categorías</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card col-lg-12 col-md-4">
        <div class="card-header mb-4">
            <table>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">
                        Agregar categoría
                    </a>
                </td>
                <td>
                    <form method="POST" action="#">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm ml-2">Exportar a JSON</button>
                    </form>
                </td>


        </div>
        <div class="card-body mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Imagen</th>
                        <th scope="col" colspan="2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <th scope="row">{{ $categoria->id }}</th>
                            <td><b>{{ $categoria->nombre }}</b></td>
                            <td>{{ strip_tags($categoria->descripcion) }}</td>
                            <td><img src="{{$categoria->imagen}}" width="125px"></td>
                            <td width="10px">
                                <a href="#" class="btn btn-primary btn-sm">Editar
                                </a>
                            </td>
                            <td width="10px">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este bloque?')">
                                        Eliminar
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>


    </div>

@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
