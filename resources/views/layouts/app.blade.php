<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="nav has-shadow">
            <div class="container">
                  <div class="nav-left">
                      <a class="nav-item" href="{{route('home')}}">
                        <img src="{{asset('imagenes/hcc.jpg')}}" alt="HospitalLogo" />
                      </a>
                      <a href="#" class="nav-item is-tab is-hidden-mobile m-l-10">Acerca De</a>
                      <a href="#" class="nav-item is-tab is-hidden-mobile">Foro</a>
                      <a href="#" class="nav-item is-tab is-hidden-mobile">Compartir</a>
                  </div>
                  <div class="nav-right" style="overflow:visible">
                      @if (Auth::guest())
                        <a href="{{route('login')}}" class="nav-item is-tab">Login</a>
                        <a href="{{route('register')}}" class="nav-item is-tab">Registrarse</a>
                      @else
                        <button class="dropdown is-aligned-right nav-item is-tab">
                            Usuario <span class="icon"><i class="fa fa-caret-down"></i></span>

                            <ul class="dropdown-menu">
                                <li><a href="#">
                                  <span class="icon"><i class="fa fa-fw m-r-10 fa-user-circle-o"></i></span>
                                  Perfil</a></li>
                                <li><a href="#">
                                  <span class="icon"><i class="fa fa-fw m-r-10 fa-bell"></i></span>
                                  Notificaciones</a></li>
                                <li><a href="#">
                                  <span class="icon"><i class="fa fa-fw m-r-10 fa-cog"></i></span>
                                  Configuraciones</a></li>
                                <li class="separator"></li>
                                <li><a href="#">
                                  <span class="icon"><i class="fa fa-fw m-r-10 fa-sign-out"></i></span>
                                  Logout</a></li>
                            </ul>
                        </button>
                      @endif
                  </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
