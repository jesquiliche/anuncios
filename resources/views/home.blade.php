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
  <section class="container mt-12 ">
    <div class="card col-lg-10 mt-4 py-2 mx-auto">
        
        <h3  class="text-center m-5"><b>¿Qué quieres encontrar?</b></h3>
        <div class="card-body">
        <form>
          <div class="row">
            <div class="col">
              <input type="text" 
              class="form-control" placeholder="Que estas buscando...">
            </div>
            <div class="col">
              <select class="form-control">
                <option>Select</option>
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
              </select>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Localidad">
            </div>
          </div>
          </div>
        </form>
        

    </div>

  </section>
 
  
@endsection

