<nav class="mfl-navbar">
  <div class="section-menu">
    <div class="logo">
      <a href="/">
        <img src="{{url('/images/logo.png')}}" alt="Monterrey Football League">
        <img class="tiny" src="{{url('/images/logo-tiny.png')}}" alt="Monterrey Football League" />
      </a>
    </div>
    <div class="pages">
      <a href="/">Inicio</a>
      <a href="{{ route('calendario') }}">Calendario</a>
      <a href="{{ route('resultados') }}">Resultados</a>
      <a href="{{ route('posiciones') }}">Posiciones</a>
      <a href="{{ route('equipos') }}">Equipos</a>
      <a href="{{ route('porristas') }}">Porristas</a>
    </div>
    <div class="social-media">
      <a class="fab fa-facebook" target="_blank" href="https://www.facebook.com/somosMFL" aria-hidden="true"></a>
      <a class="fab fa-instagram" target="_blank" href="https://www.instagram.com/mfloficial" aria-hidden="true"></a>
      <a class="fab fa-twitter" target="_blank" href="https://twitter.com/OficialMfl" aria-hidden="true"></a>
      <a class="fab fa-youtube" target="_blank" href="https://www.youtube.com/channel/UCUmdeEKUAW6mg7i4lS-GNrg" aria-hidden="true"></a>
    </div>
    <div class="action-nav">
      <a class="fas fa-bars open" href="#!" aria-hidden="true"></a>
      <a class="fas fa-times close" href="#!" aria-hidden="true"></a>
    </div>
  </div>
  <div class="section-results">
    <div class="result-title">Resultados</div>
    <div class="results-data owl-carousel">
    @foreach ($games as $game)
        <div class="result-value">
          <div class="team logo one"><img loading="lazy" src="data:image/png;base64, {{ $game->imgOne }}"></div>
          <div class="team name one">{{ $game->teamOne }}</div>
          <div class="team result one">{{ $game->resultOne }}</div>
          <div class="team logo two"><img loading="lazy" src="data:image/png;base64, {{ $game->imgTwo }}"></div>
          <div class="team name two">{{ $game->teamTwo }}</div>
          <div class="team result two">{{ $game->resultTwo }}</div>
          <div class="time-match">{{ $game->date }}</div>
        </div>
        @endforeach
    </div>
    <div class="results-link"><a href="{{ route('resultados') }}">Ver todos</a></div>
  </div>
</nav>
