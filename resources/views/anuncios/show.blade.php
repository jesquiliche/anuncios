@extends('layout.layout')

@section('title', 'Página de inicio')

@section('content')
       <section class="container mt-8 ">
        <div class="card col-lg-10 mx-auto">

            <div class="card-header m-1">

                <h4 class="resaltado text-center"><b>{{ $anuncio->titulo }}</b></h4>
                <h5 class="text-center">Precio : <b>{{ $anuncio->precio }}</h5>
                    <h5 class="text-center"></b> Estado :
                    <b>{{ $anuncio->estado->nombre }}</b>
                    Categoría : <b>{{ $anuncio->subcategoria->categoria->nombre }}</b>
                    SubCategoría : <b>{{ $anuncio->subcategoria->nombre }}</b>
                </h5>
            </div>
            <div class="card-body m-1">


                <img src="{{ $anuncio->imagen }}" class="d-block w-100" alt="{{ $anuncio->titulo }}">
                <div class="container mt-4">
                 
                    <h5>{{ $anuncio->description }}</h5>


                </div>
                <div class="form-group">
                    <h4 class="text-center resaltado">¿Desea incluir más imagenes?</h4>
                    <form action="{{ route('upload') }}" class="dropzone" id="myDropzone">
                        @csrf
                    </form>
                </div>
            </div>

        </div>

    </section>
@endsection

@section('css')
    <!-- Estilos de la vista-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" integrity="sha512-..." crossorigin="anonymous" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-..." crossorigin="anonymous"></script>
    <script>
        Dropzone.options.myDropzone = {
            paramName: 'imagen',
            maxFilesize: 2, // Tamaño máximo del archivo en megabytes
            acceptedFiles: '.jpg, .jpeg, .png', // Tipos de archivo aceptados
            dictDefaultMessage: 'Arrastra los archivos aquí para subirlos',
            maxFiles: 6, // Límite máximo de archivos
            init: function () {
                this.on('error', function (file, errorMessage) {
                    // Manejar errores de carga de archivos aquí
                });
            },
        };
    </script>
@endsection
