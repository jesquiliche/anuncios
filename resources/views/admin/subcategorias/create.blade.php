@extends('adminlte::page')

@section('title', 'Tablero')

@section('content_header')
    <h1>Agregar categoria</h1>
@stop

@section('content')
@section('content')
<div class="card">
	<div class="card-body">
		{!! Form::open(['route' => 'admin.categoria.store']) !!}
		
            <div class="form-gropup">
                {!! Form::label('bloque', 'Bloque') !!}
                {!! Form::select('bloque_id', $bloques->pluck('nombre', 'id'), null, ['class' => 'form-control']) !!}
            </div>
			<div class="form-group">
				{!! Form::label('nombre', 'Nombre') !!}
				{!! Form::text('nombre', null, [
					'class' => 'form-control',
					'placeholder' => 'Ingrese el nombre de la categoria'
				]) !!}
				
				@error('nombre')
					<span class="text-danger">{{ $message }}</span>
				@enderror
				
			</div>
			
			<div class="form-group">
				{!! Form::label('descripcion', 'Descripcion') !!}
				{!! Form::textarea('descripcion', null, [
					'class' => 'form-control',
					'placeholder' => 'Ingrese la descripción de la categoria'
				]) !!}
				
				@error('descripcion')
					<span class="text-danger">{{ $message }}</span>
				@enderror
				
			</div>
			
			{!! Form::submit('Crear categoria', [
				'class'=>'btn btn-primary'
			]) !!}
			
		{!! Form::close() !!}
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


