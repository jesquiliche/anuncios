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
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0;
            background-color: rgba(240, 240, 232, 0.98);
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .border-gray-200 {
            --tw-border-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity))
        }

        .text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        .text-gray-400 {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --tw-bg-opacity: 1;
                background-color: rgb(31 41 55 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:border-gray-700 {
                --tw-border-opacity: 1;
                border-color: rgb(55 65 81 / var(--tw-border-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: rgb(107 114 128 / var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: whitesmoke:
        }

        img {
            border-radius: 10px;
        }


        .btn {
            border-radius: 8px;
        }

        .btn-danger {
        
            border-color: #d2db4c;
            background-color: #d2db4c;
        }

        .btn-danger:hover {
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.6);
            border-color: rgb(249, 173, 30);
            background-color: rgb(199, 135, 15);
        }

        .card {
            box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);
            border-radius: 10px;
        }

        @media screen and (max-width: 768px) {

            /* Ajustar la sombra y el radio de borde para pantallas más pequeñas */
            .card {
                box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.4);
                border-radius: 10px;
            }
        }

        @media screen and (min-width: 769px) and (max-width: 1024px) {

            /* Ajustar la sombra y el radio de borde para pantallas medianas */
            .card {
                box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.4);
                border-radius: 12px;
            }
        }



        .fas {


            font-size: 18px;

        }



        .fa-check {
            color: rgb(132, 220, 132);
            font-size: 18px;


        }


        .fa-arrow-left {
            color: blue;
            font-size: 18px;
        }

        .imagen-con-texto {
            position: relative;
        }

        .imagen-con-texto .texto {
            position: absolute;
            top: 50%;
            left: 55%;
            transform: translate(-55%, -50%);
            color: #fff;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            widows: 100%;
        }

        .cards-container {
            position: absolute;
            margin-top: -160px;
            width: 300px;
            transition: transform 0.3s ease-in-out;
        }

        .cards-container:hover {
            transform: scale(1.03);
        }

        @media screen and (max-width: 768px) {

            /* Ajustar el ancho y el margen superior para pantallas más pequeñas */
            .cards-container {
                display: contents;
                box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.751);
                border-radius: 15px;
            }

            .imagen-con-texto .texto {
                display: none;
            }


        }

        @media screen and (min-width: 769px) and (max-width: 1024px) {

            /* Ajustar el ancho y el margen superior para pantallas medianas */
            .cards-container {
                display: contents;
                box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.4);
                border-radius: 15px;

            }

            .imagen-con-texto .texto {
                position: absolute;
                top: 60%;
                left: 50%;
                transform: translate(-55%, -50%);
                color: #fff;
                text-align: center;
                background-color: rgba(0, 0, 0, 0.5);
                padding: 5px;
                widows: 100%;
                font-size: 12px;
            }

            display:none;
        }

        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .social-icons {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .social-icons li {
            display: inline-block;
            margin-right: 10px;
        }

        .social-icons li:last-child {
            margin-right: 0;
        }

        .social-icons a {
            color: #fff;
            display: block;
            font-size: 20px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            width: 40px;
        }

        .social-icons i {
            color: #fff;
            display: block;
            font-size: 20px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            width: 40px;
        }


        .social-icons a:hover {
            color: #1DA1F2;
        }

        .carousel-control-prev-icon,
        .carousel-control-next {
            color: red;
        }
    </style>
    @yield('estilos')
</head>
<main>
    
        <div class="container-fluid fixed-top bg-white">
            <nav class="navbar navbar-expand-lg navbar-light bg-white ">
                <a class="navbar-brand" href="#">
                    <img src="images/logo_low.png" width="60" alt="..." loading="lazy">
                    <b>Anuncios segunda mano</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><i class="fas fa-home"></i> Home<span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger" href="">Publicar anuncio</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger ml-2" href="">Iniciar sesión</a>
                        </li>


                        </li>
                    </ul>

                </div>
            </nav>

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
