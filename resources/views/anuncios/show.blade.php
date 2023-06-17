@extends('layout.layout')

@section('title', 'Página de inicio')

@section('content')
    <section class="container mt-8 ">
        <div class="card col-lg-10 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!--
                        Solo si el usuario esta autenticado -->

            <!-- Si el usuario autenticado coincidde con
                                el propietario del anuncios -->
            @auth
                @if (auth()->user()->id == $anuncio->user_id ||
                        auth()->user()->hasRole('Admin') ||
                        auth()->user()->hasRole('Editor'))
                    <div class="row m-2">
                        <div class="col-sm-2 mt-1">
                            <!-- Botón para editar el anuncio -->
                            <a href="{{ route('anuncios.edit', ['id' => $anuncio->id]) }}"
                                class="btn btn-danger col-sm-12">Editar</a>
                        </div>
                        <form action="{{ route('anuncios.delete', ['id' => $anuncio->id]) }}" method="POST" class="col-sm-2">
                            @csrf
                            @method('DELETE')
                            <!-- Botón para borrar el anuncio con confirmación -->
                            <button type="submit" onclick="return confirm('¿Estás seguro de que quieres borrar este anuncio?')"
                                class="btn btn-danger col-sm-12 m-1">Borrar</button>
                        </form>
                    </div>
                @endif
            @endauth

            <div class="card-header m-1">
                <h4 class="resaltado text-center"><b>{{ $anuncio->titulo }}</b></h4>
                <h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <p><b>Estado:</b> {{ $anuncio->estado->nombre }}</p>
                            <p>Categoría: <b>{{ $anuncio->subcategoria->categoria->nombre }}</b></p>
                            <p>SubCategoría: <b>{{ $anuncio->subcategoria->nombre }}</b></p>
                        </div>
                        <div class="col-lg-6">
                            <p>Precio: <b>{{ $anuncio->precio . '€' }}</b></p>
                            <p>Teléfono: <b>{{ $anuncio->telefono }}</b></p>
                            <p>Provincia: <b>{{ $provincia->nombre }}</b></p>
                            <p>Población: <b>{{ $poblacion->nombre }}</b></p>
                        </div>
                </h5>
            </div>
            <div class="card-body m-1">
                <div class="container mt-4">
                    <h5>{{ $anuncio->description }}</h5>
                </div>
                <!-- Imagen principal del anuncio -->
                <img src="{{ $anuncio->imagen }}" class="d-block w-100" alt="{{ $anuncio->titulo }}">
                <div class="card3 mx-auto mt-1">
                    <div class="row">
                        <!-- Bucle para mostrar las fotos adicionales del anuncio -->
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
