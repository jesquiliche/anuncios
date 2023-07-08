@extends('adminlte::page')

@section('title', 'Lista de subcategorías')

@section('content_header')
    <h1>Lista de subcategorias</h1>
@stop

@section('content')
    <!-- Mensaje de éxito si existe -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <!-- Formulario de filtrado -->
            {!! Form::open(['route' => 'admin.subcategorias.index', 'method' => 'GET']) !!}
            {!! Form::select('categoria_id', $categorias->pluck('nombre', 'id'), request('categoria_id'), [
                'class' => 'form-control col-md-4',
                'placeholder' => 'Escoge categoría',
            ]) !!}
            <br />
            <table>
                <tr>
                    <td>
                        {!! Form::submit('Filtrar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        <!-- Enlace para agregar una nueva subcategoría -->
                        <a href="{{ route('admin.subcategorias.create') }}" class="btn btn-primary ml-2">Agregar</a>
                    </td>
                    
                </tr>
            </table>
        </div>

        <div class="card-body">
            <table id="subcategorias-table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Iteración sobre las subcategorías -->
                    @foreach ($subcategorias as $subcategoria)
                        <tr>
                            <td>{{ $subcategoria->id }}</td>
                            <td>{{ $subcategoria->nombre }}</td>
                            <td>{{ $subcategoria->descripcion }}</td>
                            
                            <td widt="10px">
                                <!-- Enlace para editar la subcategoría -->
                                <a href="{{ route('admin.subcategorias.edit', ['id' => $subcategoria->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td widt="10px">
                                <!-- Formulario para eliminar la subcategoría -->
                                <form action="{{ route('admin.subcategorias.delete', ['id' => $subcategoria->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Botón de eliminación con confirmación -->
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Si borrar esta subcategoria borra todas las subcegorias y anuncios asociados,\n¿Estás seguro de que deseas eliminar esta categoría?')">
                                        Eliminar
                                    </button>
                                </form>

                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $subcategorias->links('pagination::bootstrap-4') }}
    </div>
@endsection

