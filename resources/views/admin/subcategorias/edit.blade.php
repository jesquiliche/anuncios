@extends('adminlte::page')

@section('title', 'Tablero')

@section('content_header')
    <h1>Editar categoria</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {{-- Genera un formulario de actualización de bloque utilizando el modelo $bloque --}}
        {!! Form::model($categoria,['route' => ['admin.categoria.update',$categoria],'method'=>'put']) !!}
            {{-- Define un campo de texto para el nombre del bloque --}}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el nombre de la categoria'
                ]) !!}
                
                {{-- Muestra un mensaje de error si hay un error de validación para el campo nombre --}}
                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                
            </div>
            
            {{-- Define un campo de texto para la descripción del bloque --}}
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripcion') !!}
                {!! Form::textarea('descripcion', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese la descripción de la categoria'
                ]) !!}
                
                {{-- Muestra un mensaje de error si hay un error de validación para el campo descripcion --}}
                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                
            </div>
            
            {{-- Define el botón de envío del formulario --}}
            {!! Form::submit('Actualizar categoria', [
                'class'=>'btn btn-primary'
            ]) !!}
            
        {!! Form::close() !!} {{-- Cierra el formulario --}}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/js/ckeditor/ckeditor.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#descripcion'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('descripcion');
        });
    </script>
@stop

