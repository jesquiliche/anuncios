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
    <div class="container-fluid col-lg-12">
        <h3 class="text-center"><b>Anuncios</b></h3>
        <div class="row">

            <div class="card2 col-lg-3 mx-auto">
                <h5 class="text-center mt-2 mx-auto"><b>Filtro</b></h>
                    <div class="container mt-4">
                        <form action="{{route('home.filterMultiple')}}" method="POST">
                            @csrf
                                <div class="col-md-12">
                                    <label for="desde" class="form-label">
                                        <p class="text-sm">Título<p>
                                    </label>
                                    <div class="mb-3">

                                        <input type="text" placeholder="Título" class="form-control" id="titulo"
                                            name="titulo" value="{{$titulo}}"">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="desde" class="form-label">
                                            <p class="text-sm">Población<p>
                                        </label>
                                        <input type="text" placeholder="Población" class="form-control" id="poblacion"
                                            value="{{$poblacion}}" name="poblacion">
                                    </div>
                                </div>
                            
                        
                            <div class="row col-lg-12 mx-auto">
                                <div class="col-md-6">
                                    <label for="desde" class="form-label">
                                        <p class="text-sm">Precio desde..
                                        <p>
                                    </label>
                                    <input type="number" class="form-control" id="desde" name="desde" min="0"
                                        value={{$desde}}
                                        max="10000">
                                </div>
                                <div class="col-md-6">
                                    <label for="hasta" class="form-label">
                                        <p class="text-sm">Hasta
                                        <p>
                                    </label>
                                    <input type="number" class="form-control" id="hasta" name="hasta" min="0"
                                        value={{$hasta}}
                                        max="10000">
                                </div>
                            </div>
                            

                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label>
                                        <p class="text-sm">Categoría<p>
                                    </label>
                                    <select name="subcategoria_id" class="form-control">
                                    
                                        @foreach ($categorias as $categoria)
                                            <optgroup label="{{ $categoria->nombre }}">
                                               
                                                @foreach ($categoria->subcategorias as $subcategoria)
                                                <option value="{{ $subcategoria->id }}" {{ $subcategoria->id == $subcategoriaId ? 'selected' : '' }}>
                                                    {{ $subcategoria->nombre }}
                                                </option>
                                                
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>

                                </div>
                              
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label>
                                        <p class="text-sm">Estado<p>
                                    </label>

                                    <select name="estado_id" class="form-control">

                                        @foreach ($estados as $estado)
                                            <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-danger col-lg-12 m-1">buscar</button>
                        </form>
                    </div>

            </div>
            <div class="container col-lg-8 ">

                <div class="row ">
                    @foreach ($anuncios as $anuncio)
                        <div class="card3 col-lg-4 mx-auto my-1">
                            <a href="/anuncios/{{ $anuncio->id }}">
                                <div class="card-title m-1">
                                    <p class="resaltado">{{ $anuncio->titulo }}</p>
                                </div>
                                <div class="card-body m-1">
                                    precio : <b>{{ $anuncio->precio }}</b>
                                    <img src="{{ $anuncio->imagen }}" class="d-block w-100" alt="{{ $anuncio->titulo }}">




                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
