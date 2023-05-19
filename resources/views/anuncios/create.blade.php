@extends('layout.layout')

@section('title', 'Página de inicio')




@section('content')




    <div class="card2 col-lg-10 mx-auto mt-8 p-4">
        <h4 class="text-center resaltado"><b>Publicar anuncio<b></h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(['url' => route('anuncios.store'), 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {!! Form::token() !!}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('titulo', 'Título', ['class' => 'text-sm']) !!}
                    {!! Form::text('titulo', null, ['class' => 'form-control', 'required']) !!}
                    @error('titulo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5, 'required']) !!}
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('imagen', 'Imagen') !!}
                    {!! Form::file('imagen', ['class' => 'form-control-file', 'accept' => 'image/*', 'required', 'max' => '2048']) !!}
                    @error('imagen')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-10">
                    {!! Form::select(
                        'subcategoria_id',
                        $categorias->flatMap(function ($categoria) {
                            return [$categoria->nombre => $categoria->subcategorias->pluck('nombre', 'id')];
                        }),
                        null,
                        ['class' => 'form-control'],
                    ) !!}
                    @error('subcategoria_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="col-lg-6">
                
                <div class="form-group">
                    {!! Form::label('telefono', 'Teléfono') !!}
                    {!! Form::tel('telefono', null, ['class' => 'form-control']) !!}
                    @error('telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('estado_id', 'Estado') !!}
                    {!! Form::select('estado_id', $estados->pluck('nombre', 'id'), null, ['class' => 'form-control', 'required']) !!}
                    @error('estado_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('provincia', 'Provincia') !!}
                    {!! Form::select('provincia', $provincias->pluck('nombre', 'codigo'), null, [
                        'class' => 'form-control',
                        'required',
                    ]) !!}
                    @error('provincia')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('poblacion', 'Población') !!}
                    {!! Form::select('cod_postal', $poblaciones->pluck('nombre', 'codigo'), null, [
                        'class' => 'form-control',
                        'required',
                    ]) !!}
                    @error('cod_postal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('precio', 'Precio') !!}
                    {!! Form::number('precio', null, ['class' => 'form-control','required']) !!}
                    @error('precio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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

