<nav class="mflNavbar">
  <div class="topBar">
    <div class="containerTopBar">
      <div class="logo">
        <a href="/">
          <img src="{{url('/images/logo.png')}}" class="imgLogo" alt="Monterrey Football League">
        </a>
      </div>

      <div class="triggerNavbar">
        <span class="iconMenu icon-menu"></span>
      </div>

      <div class="mflNavbarCollapse">
        <a class="logoResponsive" href="/">
          <img src="{{url('/images/logo.png')}}" class="imgLogo" alt="Monterrey Football League">
        </a>
        <div class="closeMenuResponsive">
          <span class="iconClose icon-cancel"></span>
        </div>
        <!-- Left Side Of Navbar -->
        <ul class="mflNavbarCollapseList">
          <li class="mflNavbarCollapseItem">
            <a class="nmflNavbarCollapseLink" href="/">
              <span style="font-size:28px;">INICIO</span>
            </a>
          </li>

          <li class="mflNavbarCollapseItem">
            <a class="nmflNavbarCollapseLink" href="{{ route('calendario') }}">
              <span style="font-size:28px;">CALENDARIO</span>
            </a>
          </li>
          <li class="mflNavbarCollapseItem">
            <a class="nmflNavbarCollapseLink" href="{{ route('resultados') }}">
              <span style="font-size:28px;">RESULTADOS</span>
            </a>
          </li>
          <li class="mflNavbarCollapseItem">
            <a class="nmflNavbarCollapseLink" href="{{ route('posiciones') }}">
              <span style="font-size:28px;">POSICIONES</span>
            </a>
          </li>
          <li class="mflNavbarCollapseItem">
            <a class="nmflNavbarCollapseLink" href="{{ route('equipos') }}">
              <span style="font-size:28px;">EQUIPOS</span>
            </a>
          </li>
          <li class="mflNavbarCollapseItem">
            <a class="nmflNavbarCollapseLink" href="{{ route('porristas') }}">
              <span style="font-size:28px;">PORRISTAS</span>
            </a>
          </li>
          <li class="mflNavbarCollapseItem">
            <a class="nmflNavbarCollapseLink" href="https://www.youtube.com/channel/UCUmdeEKUAW6mg7i4lS-GNrg" target="_blank">
              <span style="font-size:28px;">MFL NETWORK</span>
            </a>
          </li>
        </ul>

        <!-- Right Side Of Navbar-->
        <ul class="mflNavbarSocialList">
          <li class="mflNavbarSocialItem">
            <a class="mflNavbarSocialLink fab fa-facebook" target="_blank" href="https://www.facebook.com/somosMFL"></a>
          </li>

          <li class="mflNavbarSocialItem">
            <a class="mflNavbarSocialLink fab fa-instagram" target="_blank" href="https://www.instagram.com/mfloficial"></a>
          </li>

          <li class="mflNavbarSocialItem">
            <a class="mflNavbarSocialLink fab fa-twitter" target="_blank" href="https://twitter.com/OficialMfl"></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bottomBar">
    <div class="containerBottomBar">
      <div class="leftBottomBar">
        <span class="titleBottomBar">RESULTADOS</span>
      </div>
      <div class="centerBottomBar sliderResults">
        <div class="listResultCenterBottomBar slides owl-carousel">
          @foreach ($games as $game)
          <div class="itemResultCenterBottomBar">
            <div class="headResult">
              <div class="rowResult">
                <div class="logoTeam">
                  <img class="iconTeam" src="data:image/png;base64, {{ $game->imgOne }}">
                </div>
                <div class="nameTeam">
                  <span class="titleNameTeam">{{ $game->teamOne }}</span>
                </div>
                <div class="scoreTeam">
                  <span class="dataScoreTeam">{{ $game->resultOne }}</span>
                </div>
              </div>
              <div class="rowResult">
                <div class="logoTeam">
                  <img class="iconTeam" src="data:image/png;base64, {{ $game->imgTwo }}">
                </div>
                <div class="nameTeam">
                  <span class="titleNameTeam">{{ $game->teamTwo }}</span>
                </div>
                <div class="scoreTeam">
                  <span class="dataScoreTeam">{{ $game->resultTwo }}</span>
                </div>
              </div>
            </div>
            <div class="footerResult">
              <div class="rowDateResult">
                <span class="dateResult">{{ $game->date }}</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="rightBottomBar">
        <a class="moreBottomBar" href="{{ route('resultados') }}">VER TODOS</a>
      </div>
    </div>
  </div>
</nav>
