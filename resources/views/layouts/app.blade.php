<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }}</title>

  <!-- Scripts hola -->
  <script src="{{asset('/js/app.js') }}"></script>
  <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

  <!-- Styles -->
  <link href="{{ asset('css/mfl.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c145db02c4.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-fluid" id="app">
    <nav style="font-family: BigNoodleTitling; font-size:1.7rem" class="navbar navbar-expand-md navbar-dark shadow-sm">
      <a class="navbar-brand" href="/">
        <img src="{{url('/images/logo.png')}}" class="d-inline-block align-top" alt="Monterrey Football League">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a style="color: white;" id="navbarDropdown" class="nav-link" href="/">
              <span>INICIO</span>
            </a>
          </li>

          <li class="nav-item">
            <a style="color: white;" id="navbarDropdown" class="nav-link" href="{{ route('resultados') }}">
              RESULTADOS
            </a>
          </li>

          <li class="nav-item">
            <a style="color: white;" id="navbarDropdown" class="nav-link" href="{{ route('calendario') }}">
              CALENDARIO
            </a>
          </li>

          <li class="nav-item">
            <a style="color: white;" id="navbarDropdown" class="nav-link" href="{{ route('posiciones') }}">
              POSICIONES
            </a>
          </li>

          <li class="nav-item">
            <a style="color: white;" id="navbarDropdown" class="nav-link" href="{{ route('equipos') }}">
              EQUIPOS
            </a>
          </li>

          <li class="nav-item">
            <a style="color: white;" id="navbarDropdown" class="nav-link" href="#">
              PORRISTAS
            </a>
          </li>

          <li class="nav-item">
            <a style="color: white;" id="navbarDropdown" class="nav-link" href="#">
              MFL NETWORK
            </a>
          </li>

          <li class="nav-item">
            <a style="color: white;" id="navbarDropdown" class="nav-link" href="#" pre>
              PATROCINADORES
            </a>
          </li>
        </ul>

        <!-- Right Side Of Navbar-->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="fab fa-facebook" style="color:#fff; text-decoration: none;" target="_blank" href="https://www.facebook.com/somosMFL">&nbsp;&nbsp;</a>
          </li>

          <li class="nav-item">
            <a class="fab fa-instagram" style="color:#fff; text-decoration: none;" target="_blank" href="https://www.instagram.com/mfloficial">&nbsp;&nbsp;</a>
          </li>

          <li class="nav-item">
            <a class="fab fa-twitter" style="color:#fff; text-decoration: none;" target="_blank" href="https://twitter.com/OficialMfl"></a>
          </li>
        </ul>
      </div>

    </nav>
    <div class="row">

      <div class="col-12 m-4" style="height: 100px;">

        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
          <div class="carousel-inner w-100" role="listbox">
            <div class="carousel-item row  active">
              <div class="col-2 float-left"><img src="{{url('/images/teams/Aguilas.png')}}" style="max-width:30%;width:auto;height:auto;" /></div>
              <div class="col-2 float-right"><img src="{{url('/images/teams/Avispones.png')}}" style="max-width:30%;width:auto;height:auto;" /></div>
              <div class="col-2 float-left"><img src="{{url('/images/teams/Cuervos.png')}}" style="max-width:30%;width:auto;height:auto;" /></div>
              <div class="col-2 float-right"><img src="{{url('/images/teams/Panteras.png')}}" style="max-width:30%;width:auto;height:auto;" /></div>
              <div class="col-2 float-left"><img src="{{url('/images/teams/Avispones.png')}}" style="max-width:30%;width:auto;height:auto;" /></div>
              <div class="col-2 float-right"><img src="{{url('/images/teams/Titanes.png')}}" style="max-width:30%;width:auto;height:auto;" /></div>
            </div>
            <div class="carousel-item row no-gutters">
              <div class="col-2 float-left"><img src="{{url('/images/teams/Texanos.png')}}" style="max-width:30%;width:auto;height:auto;" /></div>
              <div class="col-2 float-right"><img src="{{url('/images/teams/Cuervos.png')}}" style="max-width:30%;width:auto;height:auto;" /></div>
              <div class="col-2 float-left"><img src="{{url('/images/teams/Halcones.png')}}" style="max-width:30%;width:auto;height:auto;" /></div>
              <div class="col-2 float-right"><img src="{{url('/images/teams/Halcones.png')}}" style="max-width:30%;width:auto;height:auto;" /></div>
              <div class="col-2 float-left"><img src="{{url('/images/teams/Panteras.png')}}" style="max-width:30%;width:auto;height:auto;" /></div>
              <div class="col-2 float-right"><img src="{{url('/images/teams/Avispones.png')}}" style="max-width:30%;width:auto;height:auto;" /></div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>
    </div>


    <main class="py-4">
      @yield('content')
    </main>
  </div>
</body>
@yield('scripts')
</html>
