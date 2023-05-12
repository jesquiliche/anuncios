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
    <br />
    <br />
    <br />
    <br />
    <section class="container mt-2 ">
        <div class="card col-lg-12 py-2 mx-auto">

            <h3 class="text-center m-5"><b>¿Qué quieres encontrar?</b></h3>
            <div class="card-body">
                <form class="mx-auto">
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" class="form-control" placeholder="Que estas buscando...">
                        </div>
                        <div class="col-lg-3">
                            <select name="categorias" class="form-control">

                                @foreach ($categorias as $categoria)
                                    <optgroup label="{{ $categoria->nombre }}">
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @foreach ($categoria->subcategorias as $subcategoria)
                                            <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>


                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" placeholder="Localidad">
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" value="Buscar" class="form-control btn btn-danger">
                        </div>
                    </div>
            </div>
        </div>
        </form>


        </div>
        </div>


        <div class="container mt-3 col-lg-12">
            <h3 class="text-center"><b>Categorías</b></h3>
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($categorias->chunk(4) as $categoriasChunk)
                        <div class="carousel-item col-lg-12 {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($categoriasChunk as $categoria)
                                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                        <a href="#">
                                            <img src="{{ $categoria->imagen }}"" width="100" height="180"
                                                class="d-block w-100" alt="{{ $categoria->nombre }}">
                                            <div class="carousel-caption">
                                                <h5>{{ $categoria->nombre }}</h5>
                                        </a>
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
            <span class="sr-only"><b>Siguiente</b></span>
        </a>
        </div>

        <div class="container-fluid mt-3 col-lg-12 mx-auto">
            <h3 class="text-center"><b>Destacados</b></h3>
            <div class="row">
                @foreach ($anuncios as $anuncio)
                    <div class="card col-lg-4 mx-auto my-1">
                      <a href="/anuncios/{{$anuncio->id}}">
                        <div class="card-title m-1">
                            <p><b>{{ $anuncio->titulo }}</b></p>
                        </div>
                        <div class="card-body m-1">
                           
                            precio : <b>{{ $anuncio->precio }}</b>
                            <img src="{{ $anuncio->imagen }}" class="d-block w-100" alt="{{ $anuncio->titulo }}">
                            
                            <p>{{ $anuncio->description }}</p>
                            
                            
                          </div>
                      </a>
                    </div>
                @endforeach
            </div>
        </div>

        @endsection
