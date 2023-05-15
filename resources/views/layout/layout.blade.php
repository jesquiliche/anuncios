<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test TAI</title>
    <!-- Otros elementos del head -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
        integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>@yield('title')</title>
    
    
    <link rel="stylesheet" href="{{ asset('css/anuncios.css') }}">
    @yield('estilos')
</head>
<main>

    <div class="menu container-fluid fixed-top bg-white">
        <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-white ">
            <a class="navbar-brand" href="/">
                <img src="/images/logo.png" width="60" alt="..." loading="lazy">
                <span class="nav-item resaltado">Anuncios segunda mano</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-item" href="{{ route('home') }}"><i class="fas fa-home"></i> Home<span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item ml-2 dropdown">
                        <a class="nav-item dropdown-toggle ml-2" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-plus"></i>
                            @if (!auth()->check())
                            @else
                                {{ auth()->user()->name }}
                            @endif

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('registro') }}">Registro</a>
                            @if (!auth()->check())
                                <a class="dropdown-item" href="{{ route('login2') }}">Iniciar sesión</a>
                            @endif

                            @can('admin.home')
                                <a class="dropdown-item" href={{ route('admin.home') }}>Administración</a>
                            @endcan
                            <div class="dropdown-divider"></div>
                            @if (auth()->check())
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                <a class="dropdown-item " href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            @endif

                        </div>
                    </li>


                    <li class="nav-item ml-2">
                        <a href="{{route('anuncios.create')}}"><i class="far fa-file-alt"></i> Publicar anuncio</a>
                    </li>

                </ul>

            </div>
        </nav>
        </div>

    </div>

    @yield('content')

    <footer>
        <div class="container-fluid text-center mt-5 bg-dark">
            <h5 class="text-gray-300">Copyrigth Jesús Quintana Esquiliche</h5>
            <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </footer>

</main>


</html>
