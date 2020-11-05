<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }}</title>

  <!-- Styles -->
  <link href="{{ mix('css/mflStyles.css') }}" rel=preload as="style">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel=preload as="style">
  <link href="{{ mix('js/all.js') }}" rel=preload as="script">
  <link rel="preload" href="{{asset('fonts/entypo.woff')}}" as="font" type="font/woff" crossorigin>

  <link href="{{ mix('css/mflStyles.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body class="{{$page}}">
  @include('layouts.menu')
  <main class="mainContainer">
    @yield('content')
  </main>
  @if ($page != 'contactPage')
  @include('layouts.footer')
  @endif
  <!-- Scripts -->
  <script src="https://kit.fontawesome.com/c145db02c4.js" crossorigin="anonymous"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaZzCB6jzNUq-nHO11pBUoHUcRaZ0YBMA"></script>
  <script src="{{ mix('js/all.js') }}"></script>
</body>

</html>
