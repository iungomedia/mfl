@extends('layouts.mfl')
@section('content')

<div class="pagesCalendar containerMFL paddingTopPages">
  <div class="containerFilters">
    <h1 class="titlePages">CALENDARIO</h1>
    <form class="formFilters">
      <div class="itemFilter">
        {{ Form::label('idCategory', 'CATEGORÍA', ['class' => 'font-weight-bold']) }}
        {{ Form::select('idCategory', $categories, $category_id, ['class' => 'form-control', 'placeholder' => 'Todos']) }}
      </div>
      <div class="itemFilter">
        {{ Form::label('idTeam', 'EQUIPO', ['class' => 'font-weight-bold']) }}
        {{ Form::select('idTeam', $teams, $team_id, ['class' => 'form-control', 'placeholder' => 'Todos']) }}
      </div>
      <div class="itemFilter">
        {{ Form::label('idJourney', 'JORNADA', ['class' => 'font-weight-bold']) }}
        {{ Form::select('idJourney', $journeys, $journey_id, ['class' => 'form-control', 'placeholder' => 'Todos']) }}
      </div>
      <div class="itemFilter">
        {{ Form::label('lbl_button', 'Filtros', ['style' => 'color:transparent;']) }}
        {{ Form::submit('Filtrar', ['class' => 'btn btn-block btn-primary']) }}
      </div>
    </form>
  </div>
  <div class="containerCards">
    <div class="listCardsResult" style="display: none;">
      @foreach ($dates as $date)
      <div class="mix itemCardsResult {{strtolower(str_replace(' ','',$date->category).$date->group)}} {{filterTeamNameForSearch($date->teamOne)}} {{filterTeamNameForSearch($date->teamTwo)}} {{strtolower(str_replace(' ','',$date->journey))}}">
        <div class="containCardsResult">
          <div class="headResult">
            <div class="itemHeadResult">
              <span class="categoryResult">{{ $date->category }} {{$date->group}}</span>
            </div>
            <div class="itemHeadResult">
              <span class="journeyResult">{{ $date->journey }}</span>
            </div>
          </div>
          <div class="bodyResult">
            <div class="rowResult">
              <div class="logoTeam">
                <img class="iconTeam" src="data:image/png;base64, {{ $date->imgOne }}">
              </div>
              <div class="nameTeam">
                <span class="titleNameTeam">{{ $date->teamOne }}</span>
              </div>
              <div class="scoreTeam">

              </div>
            </div>
            <div class="rowResult">
              <div class="logoTeam">
                <img class="iconTeam" src="data:image/png;base64, {{ $date->imgTwo }}">
              </div>
              <div class="nameTeam">
                <span class="titleNameTeam">{{ $date->teamTwo }}</span>
              </div>
              <div class="scoreTeam">
              </div>
            </div>
          </div>
          <div class="footerResult">
            <div class="rowDateResult">
              <span class="dateResult">{{ $date->date }}</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
