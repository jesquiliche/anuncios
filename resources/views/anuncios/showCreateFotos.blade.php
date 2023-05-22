@extends('layout.layout') <!-- Extiende la plantilla de diseño llamada 'layout.layout' -->

@section('title', 'Página de inicio') <!-- Define el título de la página -->

@section('content') <!-- Inicia la sección de contenido principal -->
    <section class="container mt-8 ">
        <div class="card col-lg-10 mx-auto">
            <div class="card-header m-1">

                <!-- Muestra el título del anuncio -->
                <h4 class="resaltado text-center"><b>{{ $anuncio->titulo }}</b></h4>

                <!-- Muestra el precio del anuncio -->
                <h5 class="text-center">Precio : <b>{{ $anuncio->precio }}</h5>

                <!-- Muestra el estado del anuncio, la categoría y la subcategoría -->
                <h5 class="text-center"></b> Estado :
                    <b>{{ $anuncio->estado->nombre }}</b>
                    Categoría : <b>{{ $anuncio->subcategoria->categoria->nombre }}</b>
                    SubCategoría : <b>{{ $anuncio->subcategoria->nombre }}</b>
                </h5>
            </div>
            <div class="card-body m-1">

                <!-- Muestra la imagen del anuncio -->
                <img src="{{ $anuncio->imagen }}" class="d-block w-100" alt="{{ $anuncio->titulo }}">
                <div class="container mt-4">
                    <!-- Muestra la descripción del anuncio -->
                    <h5>{{ $anuncio->description }}</h5>
                </div>

                <div class="form-group">
                    <h4 class="text-center resaltado">¿Desea incluir más imágenes?</h4>
                    <!-- DropZone -->
                    <form action="{{ route('fotos.store') }}" method="POST" enctype="multipart/form-data" class="dropzone"
                        id="myDropzone">
                        @csrf
                        <input type="hidden" name="anuncio_id" value="{{ $anuncio->id }}">
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('css')
    <!-- Estilos de la vista-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css"
        crossorigin="anonymous" />
@endsection

@section('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.myDropzone = {
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
