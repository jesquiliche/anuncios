@extends('adminlte::page')

@section('title', 'Agregar Categoría')

@section('content_header')
    <h1>Agregar Categoría</h1>
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
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', $categoria->nombre, [
                    'class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''),
                    'required',
                ]) !!}
                @if ($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('descripcion', 'Descripción:') !!}
                {!! Form::textarea('descripcion', $categoria->descripcion, [
                    'class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''),
                    'required',
                ]) !!}
                @if ($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <table>
                    <td>
                        {!! Form::label('imagen', 'Imagen:') !!}
                        {!! Form::file('imagen', [
                            'class' => 'form-control-file' . ($errors->has('imagen') ? ' is-invalid' : ''),
                            'accept' => 'image/*',
                            'onchange' => 'previewImage(event)',
                        ]) !!}
                        @if ($errors->has('imagen'))
                            <div class="invalid-feedback">
                                {{ $errors->first('imagen') }}
                            </div>
                        @endif
                    </td>
                    <td>
                        <img id="preview" src="{{ $categoria->imagen }}"" alt="Preview de la imagen"
                            style="max-width: 200px; margin-top: 10px; padding-left: 20px;">
                    </td>
            </div>

            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop
