@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Editar usuario</h1>
@stop

@section('content')
    <div class="card p-4 col-md-12">
        <h5>Nombre</h5>
        <p class="form-control">{{$user->name}}</p>

        {!! Form::open(['route' => ['admin.user.update', $user->id], 'method' => 'PUT']) !!}
        <h5>Roles</h5>
        @foreach($roles as $role)
            <div class="form-check">
                {{ Form::checkbox('roles[]', $role->id, $user->roles->pluck('id')->contains($role->id), ['class' => 'form-check-input', 'id' => 'role-' . $role->id]) }}
                {{ Form::label('role-' . $role->id, $role->name, ['class' => 'form-check-label ml-1']) }}
            </div>
        @endforeach

        {{ Form::submit('Asignar roles', ['class' => 'btn btn-primary mt-3']) }}
        {!! Form::close() !!}
    </div>
@stop
