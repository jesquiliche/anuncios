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


    <div class="card2 col-lg-10 mx-auto mt-4 p-4">
        <h3 class="text-center">Publicar anuncio</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="subcategoria_id">Subcategoría</label>
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
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" name="telefono" id="telefono" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="estado_id">Estado</label>
                        <select name="estado_id" id="estado_id" class="form-control" required>
                            <option value="">Seleccione una opción</option>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="provincia">Provincia</label>
                        <select name="probincia" id="provincia" class="form-control" required>
                            <option value="">Seleccione una opción</option>
                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia->codigo }}">{{ $provincia->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                     
                        <label for="cod_postal">Población</label>
                        <select name="poblacion" id="poblacion" class="form-control" required>
                            <option value="">Seleccione una opción</option>
                            @foreach ($poblaciones as $poblacion)
                                <option value="{{ $poblacion->codigo }}">{{ $poblacion->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" id="precio" class="form-control">
                    </div>
                    <div>


                        <diV>

                        </div>

                    </div>

                </div>
                <button type="submit" class="btn btn-danger mx-auto">Guardar</button>
        </form>
    </div>
    </div>
@endsection
