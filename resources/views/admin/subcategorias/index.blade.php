@extends('adminlte::page')

@section('title', 'Lista de preguntas')

@section('content_header')
    <h1>Lista de subcategorias</h1>
@stop

@section('content')
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
                        <a href="{{ route('admin.subcategorias.create') }}" class="btn btn-primary ml-2">Agregar</a>
                    </td>
                    <td>
                        <form method="POST" action="#">
                            @csrf
                            <button type="submit" class="btn btn-primary ml-2">Exportar a JSON</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>

        <div class="card-body">
            <table id="preguntas-table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategorias as $subcategoria)
                        <tr>
                            <td>{{ $subcategoria->id }}</td>
                            <td>{{ $subcategoria->nombre }}</td>
                            <td>{{ $subcategoria->descripcion }}</td>
                            
                            <td widt="10px">
                                <a href="#" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td widt="10px">
                                <form action="{{ route('admin.subcategorias.delete', ['id' => $subcategoria->id]) }}"" method="POST">
                                    @csrf
                                    @method('DELETE')
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
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#preguntas-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "infoFiltered": "(filtrado de un total de _MAX_ entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron coincidencias",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": activar para ordenar la columna ascendente",
                        "sortDescending": ": activar para ordenar la columna descendente"
                    },
                }
            });
        });
    </script>
@stop