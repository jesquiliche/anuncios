@extends('layout.layout')

@section('title', 'Página de inicio')

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
                                <!-- Iteración sobre las categorías -->
                                @foreach ($categorias as $categoria)
                                    <optgroup label="{{ $categoria->nombre }}">
                                        <!-- Iteración sobre las subcategorías -->
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
                </form>
            </div>
        </div>

        <div class="container mt-3 col-lg-12">
            <h4 class="text-center resaltado"><b>Categorías</b></h4>
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <!-- Iteración sobre las categorías en grupos de cuatro -->
                    @foreach ($categorias->chunk(4) as $categoriasChunk)
                        <div class="carousel-item col-lg-12 {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                <!-- Iteración sobre las categorías del grupo -->
                                @foreach ($categoriasChunk as $categoria)
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <img src="{{ $categoria->imagen }}" width="100" height="180"
                                            class="d-block w-100 rounded" alt="{{ $categoria->nombre }}">
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
                    <span class="sr-only"></span>
                </a>
            </div>

            <div class="container-fluid mt-3 col-lg-12 mx-auto">
                <h4 class="text-center resaltado"><b>Anuncios</b></h4>
                <div class="row">
                    <!-- Iteración sobre los anuncios -->
                    @foreach ($anuncios as $anuncio)
                        <div class="card3 col-lg-4 mx-auto">
                            

                            <a href="/anuncios/{{ $anuncio->id }}">
                                
                                <div class="card-title m-1">
                                    
                                    <p class="resaltado">
                                        @auth
                                            @if (auth()->user()->id == $anuncio->user_id)
                                                <i class="fas fa-edit mr-1"></i>
                                            @endif
                                        @endauth
                                        {{ $anuncio->titulo }}</p>
                                </div>
                                <div class="card-body m-1">
                                    
                                    <img src="{{ $anuncio->imagen }}" class="d-block w-100 rounded" alt="{{ $anuncio->titulo }}">
                                    <p>{{ $anuncio->description }}</p>
                                    precio : <b>{{ $anuncio->precio ."€"}}</b>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="pagination">
                    <!-- Mostrar botón "Anterior" si hay una página anterior disponible -->
                    @if ($anuncios->currentPage() > 1)
                        <a href="{{ $anuncios->previousPageUrl() }}" class="btn btn-danger m-1" rel="prev">Anterior</a>
                    @endif

                    <!-- Iteración sobre las páginas disponibles -->
                    @foreach (range(1, $anuncios->lastPage()) as $page)
                        <!-- Resaltar la página actual -->
                        @if ($page == $anuncios->currentPage())
                            <span class="btn btn-success m-1 active">{{ $page }}</span>
                        @else
                            <!-- Mostrar enlace a la página correspondiente -->
                            <a href="{{ $anuncios->url($page) }}" class=" m-1 mt-2">{{ $page }}</a>
                        @endif
                    @endforeach

                    <!-- Mostrar botón "Siguiente" si hay una página siguiente disponible -->
                    @if ($anuncios->hasMorePages())
                        <a href="{{ $anuncios->nextPageUrl() }}" class="btn btn-danger m-1" rel="next">Siguiente</a>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
