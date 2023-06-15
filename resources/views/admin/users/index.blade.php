@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
<!-- Muestra mensajes de éxito de vistas auxiliares, como la vista de edición -->
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
            <h3 class="card-title">Usuarios</h3>
        </div>
        
        <div class="card-body">
            <!-- Creamos una tabla para mostrar la lista de usuarios -->
            <table id="users-table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha de Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Para cada usuario -->
                    @foreach($users as $user)
                    <tr>
                        <!-- Mostrar el id -->
                        <td><b>{{ $user->id }}</b></td>
                        <!-- Mostrar el nombre -->
                        <td><b>{{ $user->name }}</b></td>
                        <!-- Mostrar el email -->
                        <td>{{ $user->email }}</td>
                         <!-- Mostrar fecha de creación -->
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <!-- Enlace a la vista de edición -->
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
    
@stop

@section('css')
    <!-- Estilos de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inicialización de DataTables
            $('#users-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                }
            });
        });
    </script>
@stop
