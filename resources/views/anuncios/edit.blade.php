@extends('layout.layout')

@section('title', 'Editar aanuncio')

@section('content')

    <div class="card2 col-lg-10 mx-auto mt-8 p-4">
        <h4 class="text-center resaltado"><b>Editar anuncio<b></h4>
        @if ($errors->any())
            <!-- Muestra los errores de validación -->
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de edición de datos,
            rellena los controles cob los valores del anuncio,
            utiliza el método PUT para utilizar y el enctype`multipart/form-data'
            para poder subir imagenres -->
        {!! Form::open([
            'route' => ['anuncios.update', $anuncio->id],
            'method' => 'PUT',
            'enctype' => 'multipart/form-data',
        ]) !!}
        <!-- CRSF token -->
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
                    <img id="preview-image" src="{{ $anuncio->imagen }}" class="d-block col-lg-10"
                        alt="{{ $anuncio->titulo }}">
                    {!! Form::label('imagen', 'Imagen') !!}
                    {!! Form::file('imagen', [
                        'class' => 'form-control-file',
                        'accept' => 'image/*',
                        'max' => '2048',
                        'id' => 'image-input',
                    ]) !!}
                    <!-- Mostrar errores de validación -->
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
                     <!-- Mostrar errores de validación -->
                    @error('subcategoria_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('estado_id', 'Estado') !!}
                    {!! Form::select('estado_id', $estados->pluck('nombre', 'id'), $anuncio->id, [
                        'class' => 'form-control',
                        'required',
                    ]) !!}
                    <!-- Mostrar errores de validación -->
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
                    {!! Form::tel('telefono', $anuncio->telefono, ['class' => 'form-control', 'required']) !!}
                    @error('telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('provincia', 'Provincia') !!}
                    {!! Form::select('provincia', $provincias->pluck('nombre', 'codigo'), $anuncio->provincia, [
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
                    {!! Form::number('precio', $anuncio->precio, ['class' => 'form-control', 'required']) !!}
                    @error('precio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-danger mx-auto']) !!}
                    {!! Form::close() !!}
                </div>

            </div>
            </div>
            <div class="card3 mx-auto mt-1">
                <div class="row">
                    <!-- Mostrar todas las imágnenes opcionales asociadas
                        al anuncio -->
                    @foreach ($anuncio->fotos as $foto)
                        <div class="card3 col-lg-3 mx-auto mt-3">
                            <img src="{{ $foto->path }}" alt="Foto del anuncio" width="180px" class="zoom mx-auto">
                            <!-- Anadir opcion de poder borrar la imagen -->
                            <div class="text-center">
                                <form action="{{ route('fotos.destroy', ['id' => $foto->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-2 ml-6 btn-block">Borrar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <h4 class="text-center resaltado mt-4">¿Desea incluir más imágenes?</h4>
                    <!-- DropZone -->
                    <!-- Permite anadir imagenes solo con arrastrar y soltar -->
                    <form action="{{ route('fotos.store') }}" method="POST" enctype="multipart/form-data" class="dropzone"
                        id="myDropzone">
                        @csrf
                        <input type="hidden" name="anuncio_id" value="{{ $anuncio->id }}">
                    </form>
                </div>

        </div>
    </div>
@endsection


@section('css')
    <!-- Estilos de DropZone-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css"
        crossorigin="anonymous" />
@endsection

@section('js')
    <script>
        // Permite cambiar la imagen principal del anuncio y
        //    hace un preview 
        document.getElementById('image-input').addEventListener('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('preview-image').src = event.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
    <!-- opciones para Dropzzne -->
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
      <script>
          Dropzone.options.myDropzone = {
              //Como se llamara al campo el resquest
              paramName: 'imagen',
              maxFilesize: 2, <!-- Tamaño máximo del archivo en megabytes -->
              acceptedFiles: '.jpg, .jpeg, .png', <!-- Tipos de archivo aceptados -->
              dictDefaultMessage: 'Arrastra los archivos aquí para subirlos',
              maxFiles: 6, <!-- Límite máximo de archivos -->
              init: function() {
                  this.on('error', function(file, errorMessage) {
                      // Manejar errores de carga de archivos aquí
                  });
              },
          };
      </script>
  
@endsection
