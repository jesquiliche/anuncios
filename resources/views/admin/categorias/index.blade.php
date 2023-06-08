@extends('adminlte::page')

@section('title', 'Tablero')

@section('content_header')
    <h1>Lista de Categorías</h1>
@stop

@section('content')
    {{-- Comprobación de sesión --}}
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
                    <a href="{{route('admin.categoria.create')}}" class="btn btn-primary btn-sm">
                        Agregar categoría
                    </a>
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
                    {{-- Iteración a través de las categorías --}}
                    @foreach ($categorias as $categoria)
                        <tr>
                            <th scope="row">{{ $categoria->id }}</th>
                            <td><b>{{ $categoria->nombre }}</b></td>
                            <td>{{ strip_tags($categoria->descripcion) }}</td>
                            <td><img src="{{ $categoria->imagen }}" width="125px"></td>
                            {{-- Botón de edición --}}
                            <td width="10px">
                                <a href="{{ route('admin.categoria.edit', ['id' => $categoria->id]) }}"" class="btn btn-primary btn-sm">Editar
                                </a>
                            </td>
                            {{-- Botón de borrado --}}
                            <td width="10px">
                                <form action="{{ route('admin.categoria.delete', ['id' => $categoria->id]) }}"" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Si borrar esta cagegoria borra todas las subcegorias y anuncios asociados,\n¿Estás seguro de que deseas eliminar esta categoría?')">
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
    {{ $categorias->links('pagination::bootstrap-4') }}


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@stop
