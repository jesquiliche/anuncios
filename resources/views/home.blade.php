@extends('layout.layout')

@section('title', 'Página de inicio')

@section('estilos')
    <style>
        .carousel-control-prev-icon,
        .carousel-control-next-icon {


            color: black;
        }
    </style>
@endsection




@section('content')
   
    <section class="container mt-8 ">
        <div class="card2 col-lg-12 py-2 mx-auto">

            <h4 class="text-center m-5"><b class="resaltado">¿Qué quieres encontrar?</b></h4>
            <div class="card-body">
                <form action="{{ route('home.filter') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" name="titulo" class="form-control" placeholder="Que estas buscando...">
                        </div>
                        <div class="col-lg-3">
                            <select name="subcategoria_id" class="form-control">

                                @foreach ($categorias as $categoria)
                                    <optgroup label="{{ $categoria->nombre }}">

                                        @foreach ($categoria->subcategorias as $subcategoria)
                                            <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>


                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="poblacion" class="form-control" placeholder="Localidad">
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" value="Buscar" class="form-control btn btn-danger">
                        </div>
                    </div>
            </div>
        </div>
        </form>

        <div class="container mt-3 col-lg-12">
            <h4 class="text-center resaltado"><b>Categorías</b></h4>
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($categorias->chunk(4) as $categoriasChunk)
                        <div class="carousel-item col-lg-12 {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($categoriasChunk as $categoria)
                                    <div class="col-sm-6 col-md-4 col-lg-3">

                                        <img src="{{ $categoria->imagen }}"" width="100" height="180"
                                            class="d-block w-100" alt="{{ $categoria->nombre }}">
                                        <div class="carousel-caption">
                                            <h5>{{ $categoria->nombre }}</h5>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only"><b>Anterior</b></span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only"></i>></i></span>
                </a>
            </div>

            <div class="container-fluid mt-3 col-lg-12 mx-auto">
                <h4 class="text-center resaltado"><b>Anuncios</b></h4>
                <div class="row">
                    @foreach ($anuncios as $anuncio)
                        <div class="card3 col-lg-4 mx-auto">
                            <a href="/anuncios/{{ $anuncio->id }}">
                                <div class="card-title m-1">
                                    <p class="resaltado">{{ $anuncio->titulo }}</b></p>
                                </div>
                                <div class="card-body m-1">

                                    precio : <b>{{ $anuncio->precio }}</b>
                                    <img src="{{ $anuncio->imagen }}" class="d-block w-100" alt="{{ $anuncio->titulo }}">

                                    <p>{{ $anuncio->description }}</p>


                                </div>
                            </a>
                        </div>
                    @endforeach

                    <div class="pagination">
                        @if ($anuncios->previousPageUrl())
                            <a href="{{ $anuncios->previousPageUrl() }}" class="btn btn-danger m-1"
                                rel="prev">Anterior</a>
                        @endif

                        @if ($anuncios->nextPageUrl())
                            <a href="{{ $anuncios->nextPageUrl() }}" class="btn btn-danger m-1"
                                rel="next">Siguiente</a>
                        @endif
                    </div>





                </div>
            </div>
        </div>
    </section>
    @endsection
