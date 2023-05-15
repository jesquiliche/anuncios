@extends('layout.layout')

@section('title', 'Página de inicio')


@section('content')

   


    <div class="card2 col-lg-10 mx-auto mt-8 p-4">
        <h4 class="text-center resaltado"><b>Publicar anuncio<b></h4>
        {!! Form::open(['url' => 'guardar', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {!! Form::token() !!}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('titulo', 'Título',['class'=>'text-sm']) !!}
                    {!! Form::text('titulo', null, ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5, 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('imagen', 'Imagen') !!}
                    {!! Form::file('imagen', ['class' => 'form-control-file']) !!}
                </div>
                <div class="col-lg-10">
                    {!! Form::select('subcategoria_id', $categorias->flatMap(function ($categoria) {
                        return [$categoria->nombre => $categoria->subcategorias->pluck('nombre', 'id')];
                    }), null, ['class' => 'form-control']) !!}
                    

                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('telefono', 'Teléfono') !!}
                    {!! Form::tel('telefono', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('estado_id', 'Estado') !!}
                    {!! Form::select('estado_id',  $estados->pluck('nombre', 'id'), null, ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('provincia', 'Provincia') !!}
                    {!! Form::select('provincia', $provincias->pluck('nombre', 'codigo'), null, ['class' => 'form-control', 'required']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('poblacion', 'Población') !!}
                    {!! Form::select('poblacion', $poblaciones->pluck('nombre', 'codigo'), null, ['class' => 'form-control', 'required']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('precio', 'Precio') !!}
                    {!! Form::number('precio', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('Guardar', ['class' => 'btn btn-danger mx-auto']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    </div>
@endsection
