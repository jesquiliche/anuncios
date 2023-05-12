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
    <br />
    <br />
    <div class="container mt-3 col-lg-10 mx-auto">
        <h3 class="text-center"><b>Anuncios</b></h3>
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
