<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Anuncios segunda mano</title>
    <!-- Otros elementos del head -->

    <!-- Incluye los estilos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
        integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Incluye los scripts de jQuery, Popper.js y Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- Incluye los estilos de Font Awesome (versión 5.15.3) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>@yield('title')</title>

    <!-- Incluye los estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/anuncios.css') }}">

    @yield('css')
    <!-- Incluye estilos específicos de la vista actual -->
</head>
<main>
    <!-- Barra de navegación -->
    <div class="menu container-fluid fixed-top bg-white">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand" href="/">
                    <img src="/images/logo.jpeg" width="60" alt="..." loading="lazy">
                    <span class="nav-item resaltado">Anuncios segunda mano</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-item" href="{{ route('home') }}"><i class="fas fa-home"></i> Home<span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <!-- menú usuario -->
                        <li class="nav-item ml-2 dropdown">
                            <a class="nav-item dropdown-toggle ml-2" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-plus"></i>
                                @guest
                                    <!-- Comprueba si el usuario es un invitado (no autenticado) -->
                                @else
                                    {{ auth()->user()->name }}
                                    <!-- Muestra el nombre del usuario autenticado -->
                                @endguest
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('registro') }}">Registro</a>
                                <!-- Enlace para registrarse -->
                                @guest
                                    <!-- Comprueba si el usuario es un invitado -->
                                    <a class="dropdown-item" href="{{ route('login2') }}">Iniciar sesión</a>
                                    <!-- Enlace para iniciar sesión -->
                                @endguest
                                @can('admin.home')
                                    <!-- Comprueba si el usuario tiene permisos de administrador -->
                                    <a class="dropdown-item" href="{{ route('admin.home') }}">Administración</a>
                                    <!-- Enlace para acceder a la sección de administración -->
                                @endcan
                                <div class="dropdown-divider"></div> <!-- Línea divisoria en el menú desplegable -->
                                @auth
                                    <!-- Comprueba si el usuario está autenticado -->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        <!-- Formulario para cerrar sesión -->
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                        <!-- Enlace para cerrar sesión -->
                                    </a>
                                @endauth
                            </div>
                        </li>
                        <!-- menú usuario -->

                        <li class="nav-item ml-2">
                            <a href="{{ route('anuncios.create') }}"><i class="far fa-file-alt"></i> Publicar
                                anuncio</a>
                        </li>

                    </ul>

                </div>
            </nav>
        </div>

    </div>

    @yield('content')
    <!-- Contenido específico de cada vista -->

    @yield('js')
    <footer>
        <div class="container-fluid text-center mt-4 bg-dark">
            <div class="container mx-auto bg-dark">
                <br />
                <h6 class="text-white text-center mt-4">Copyrigth &copy; Jesús Quintana Esquiliche</h6>
                <br />
            </div>

        </div>
    </footer>


</main>

</html>