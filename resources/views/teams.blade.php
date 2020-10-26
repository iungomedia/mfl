@extends('layouts.mfl')

@section('content')


<div class="pagesTeams containerMFL paddingTopPages">
  <div class="containerFilters">
    <h1 class="titlePages">EQUIPOS MFL</h1>
  </div>
  <div class="containerCards">
    <div class="listCardsResult">
      @foreach ($teams as $team)
      <div class="mix itemCardsResult">
        <div class="containCardsResult">
          <div class="bodyResult">
            <div class="rowResult">
              <div class="logoTeam">
                <img class="iconTeam" src="data:image/png;base64, {{ $team->img }}">
              </div>
              <div class="nameTeam">
                <span class="titleNameTeam">{{ $team->teamName }}</span>
              </div>
            </div>
          </div>
          <div class="footerResult">
            <div class="itemHeadResult">
              <a class="linkTeam" href="{{ route('contacto', $team->teamId) }}">Contacto</a>
            </div>
            <div class="itemHeadResult">
              <a class="linkTeam" href="{{ url('calendario/equipo/'.$team->teamId) }}">Calendario</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
