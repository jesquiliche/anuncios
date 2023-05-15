@extends('layout.layout')

@section('title', 'Página de inicio')



@section('content')
  
    <section class="container mt-8 ">


        <div class="container mt-3 col-lg-12 mx-auto">
            <h3 class="text-center"><b>Anuncios</b></h3>
            <div class="row">
            @foreach ($anuncios as $anuncio)
                <div class="card col-lg-3 mx-auto my-2">
                <div class="card-title m-1">
              
                </div>
                <div class="card-body m-1">
                    <b>{{$anuncio->titulo}}</b>
                    <p>precio : <b>{{$anuncio->precio}}</b></p>
                    <img src="{{$anuncio->imagen}}" class="d-block w-100" alt="{{ $anuncio->titulo }}">
                </div>
                </div>
        
            @endforeach
            </div>

        </div>
    </section>
@endsection
