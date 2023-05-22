@extends('layout.layout')

@section('title', 'Página de inicio')

@section('content')

    <div class="card2 col-lg-10 mx-auto mt-8 p-4">
        <h4 class="text-center resaltado"><b>Editar anuncio<b></h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(['route' => ['anuncios.update', $anuncio->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        {!! Form::token() !!}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('titulo', 'Título', ['class' => 'text-sm']) !!}
                    {!! Form::text('titulo', $anuncio->titulo, ['class' => 'form-control', 'required']) !!}
                    @error('titulo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="form-group">
                    <img id="preview-image" src="{{ $anuncio->imagen }}" class="d-block col-lg-12" alt="{{ $anuncio->titulo }}">
                    {!! Form::label('imagen', 'Imagen') !!}
                    {!! Form::file('imagen', ['class' => 'form-control-file', 'accept' => 'image/*', 'max' => '2048','id' => 'image-input']) !!}
                    @error('imagen')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('subcategoria_id', 'Categoría') !!}
                    {!! Form::select(
                        'subcategoria_id',
                        $categorias->flatMap(function ($categoria) {
                            return [$categoria->nombre => $categoria->subcategorias->pluck('nombre', 'id')];
                        }),
                        $anuncio->subcategoria_id,
                        ['class' => 'form-control'],
                    ) !!}
                    @error('subcategoria_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('estado_id', 'Estado') !!}
                    {!! Form::select('estado_id', $estados->pluck('nombre', 'id'), $anuncio->id, ['class' => 'form-control', 'required']) !!}
                    @error('estado_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
            </div>
            
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', $anuncio->description, ['class' => 'form-control', 'rows' => 5, 'required']) !!}
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('telefono', 'Teléfono') !!}
                    {!! Form::tel('telefono', $anuncio->telefono, ['class' => 'form-control','required']) !!}
                    @error('telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="form-group">
                    {!! Form::label('provincia', 'Provincia') !!}
                    {!! Form::select('provincia', $provincias->pluck('nombre', 'codigo'),$anuncio->provincia, [
                        'class' => 'form-control',
                        'required',
                    ]) !!}
                    @error('provincia')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('poblacion', 'Población') !!}
                    {!! Form::select('cod_postal', $poblaciones->pluck('nombre', 'codigo'), $anuncio->cod_postal, [
                        'class' => 'form-control',
                        'required',
                    ]) !!}
                    @error('cod_postal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('precio', 'Precio') !!}
                    {!! Form::number('precio',$anuncio->precio, ['class' => 'form-control','required']) !!}
                    @error('precio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card3 mx-auto mt-1">
            <div class="row">

                @foreach ($anuncio->fotos as $foto)
                    <div class="card3 col-lg-3 mx-auto mt-3">
                        <img src="{{ $foto->path }}" alt="Foto del anuncio" width="180px" class="zoom">
                    </div>
                @endforeach
            </div>

        </div>

        <div class="form-group">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-danger mx-auto']) !!}

        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('js')
<script>
    document.getElementById('image-input').addEventListener('change', function(e) {
        var reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('preview-image').src = event.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
@endsection