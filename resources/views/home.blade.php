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
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <section class="container mt-2 ">
    <div class="card col-lg-10 py-2 mx-auto">
        
        <h3  class="text-center m-5"><b>¿Qué quieres encontrar?</b></h3>
        <div class="card-body">
        <form class="mx-auto">
          <div class="row">
            <div class="col-lg-4">
              <input type="text" 
              class="form-control" placeholder="Que estas buscando...">
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
   
  <div class="container col-lg-10 mt-4">
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="false">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
            <div class="col">
              <img src="https://picsum.photos/100/100" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <h3>Titulo 1</h3>
                <p>Descripción 1</p>
              </div>
            </div>
            <div class="col">
              <img src="https://picsum.photos/100/100" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <h3>Titulo 1</h3>
                <p>Descripción 1</p>
              </div>
            </div>
            <div class="col">
              <img src="https://picsum.photos/100/100" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <h3>Titulo 1</h3>
                <p>Descripción 1</p>
              </div>
            </div>
            <div class="col">
              <img src="https://picsum.photos/100/100" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <h3>Titulo 1</h3>
                <p>Descripción 1</p>
              </div>
            </div>
            <div class="col">
              <img src="https://picsum.photos/100/100" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <h3>Titulo 1</h3>
                <p>Descripción 1</p>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col">
              <img src="https://picsum.photos/100/100" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <h3>Titulo 1</h3>
                <p>Descripción 1</p>
              </div>
            </div>
            <div class="col">
              <img src="https://picsum.photos/100/100" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <h3>Titulo 1</h3>
                <p>Descripción 1</p>
              </div>
            </div>
            <div class="col">
              <img src="https://picsum.photos/100/100" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <h3>Titulo 1</h3>
                <p>Descripción 1</p>
              </div>
            </div>
            <div class="col">
              <img src="https://picsum.photos/100/100" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <h3>Titulo 1</h3>
                <p>Descripción 1</p>
              </div>
            </div>
            <div class="col">
              <img src="https://picsum.photos/100/100" class="d-block w-100" alt="...">
              <div class="carousel-caption">
                <h3>Titulo 1</h3>
                <p>Descripción 1</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  
 
 
  
@endsection

