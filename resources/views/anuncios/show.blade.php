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
                <div class="container mt-4">
                    <h5>{{ $anuncio->description }}</h5>
                </div>
                <img src="{{ $anuncio->imagen }}" class="d-block w-100" alt="{{ $anuncio->titulo }}">
                <div class="card3 mx-auto mt-1">
                    <div class="row">

                        @foreach ($anuncio->fotos as $foto)
                            <div class="card3 col-lg-3 mx-auto mt-3">
                                <img src="{{ $foto->path }}" alt="Foto del anuncio" width="180px" class="zoom">
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
