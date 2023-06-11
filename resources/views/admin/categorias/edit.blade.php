@extends('adminlte::page')

@section('title', 'Agregar Categoría')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')
    <div class="container">
        <div class="card col-lg-12 p-4">
            {!! Form::model($categoria, [
                'route' => ['admin.categoria.update', $categoria->id],
                'files' => true,
                'method' => 'PUT',
            ]) !!}

            <div class="form-group">
                <!-- Etiqueta del campo "nombre" -->
                {!! Form::label('nombre', 'Nombre:') !!}
                <!-- Campo de entrada de texto para el nombre -->
                {!! Form::text('nombre', $categoria->nombre, [
                    'class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''),
                    'required',
                ]) !!}
                @if ($errors->has('nombre'))
                    <div class="invalid-feedback">
                        <!-- Mensaje de error si el campo "nombre" tiene errores de validación -->
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <!-- Etiqueta del campo "descripcion" -->
                {!! Form::label('descripcion', 'Descripción:') !!}
                <!-- Campo de entrada de texto (área de texto) para la descripción -->
                {!! Form::textarea('descripcion', $categoria->descripcion, [
                    'class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''),
                    'required',
                ]) !!}
                @if ($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        <!-- Mensaje de error si el campo "descripcion" tiene errores de validación -->
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <table>
                    <td>
                        <!-- Etiqueta del campo "imagen" -->
                        {!! Form::label('imagen', 'Imagen:') !!}
                        <!-- Campo de selección de archivo de imagen -->
                        {!! Form::file('imagen', [
                            'class' => 'form-control-file' . ($errors->has('imagen') ? ' is-invalid' : ''),
                            'accept' => 'image/*',
                            'onchange' => 'previewImage(event)',
                        ]) !!}
                        @if ($errors->has('imagen'))
                            <div class="invalid-feedback">
                                <!-- Mensaje de error si el campo "imagen" tiene errores de validación -->
                                {{ $errors->first('imagen') }}
                            </div>
                        @endif
                    </td>
                    <td>
                        <!-- Elemento de imagen para previsualizar la imagen seleccionada -->
                        <img id="preview" src="{{ $categoria->imagen }}" alt="Preview de la imagen"
                            style="max-width: 200px; margin-top: 10px; padding-left: 20px;">
                    </td>
                </table>
            </div>

            <!-- Botón de envío del formulario -->
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

    <script>
        // Función para previsualizar la imagen seleccionada
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Actualizar la fuente de la imagen para mostrar la previsualización
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                // Leer el archivo de imagen como una URL de datos
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop
