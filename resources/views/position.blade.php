@extends('layouts.mfl')

@section('content')

<div class="pagesScore containerMFL paddingTopPages">
  <div class="containerFilters">
    <h1 class="titlePages">POSICIONES</h1>
    <form class="formFilters" action="{{ url('posiciones/filtro') }}" method="post">
      {!! csrf_field() !!}
      <div class="itemFilter">
        {{ Form::label('idCategory', 'CATEGORÍA', ['class' => 'font-weight-bold']) }}
        {{ Form::select('idCategory', $categories, $cDefault, ['class' => 'form-control', 'placeholder' => 'Todos']) }}
      </div>
      <div class="itemFilter">
        {{ Form::label('idJourney', 'JORNADA', ['class' => 'font-weight-bold']) }}
        {{ Form::select('idJourney', $journeys, $jDefault, ['class' => 'form-control', 'placeholder' => 'Todos']) }}
      </div>
      <div class="itemFilter">
        {{ Form::label('lbl_button', 'Filtros', ['style' => 'color:transparent;']) }}
        {{ Form::submit('Filtrar', ['class' => 'btn btn-block btn-primary']) }}
      </div>
    </form>
  </div>
  <div class="containerCards">
    <div class="tableScore">
      <table class="table table-striped table-hover table-light table-bordered">
        <thead>
          <tr>
            <th colspan="4" scope="col"></th>
            <th scope="col">J</th>
            <th scope="col">G</th>
            <th scope="col">P</th>
            <th scope="col">PCT</th>
            <th scope="col">PF</th>
            <th scope="col">PC</th>
            <th scope="col">DIF</th>
          </tr>
        </thead>
        <tbody>
          @foreach($positions as $position)
          <tr>
            <td class="columTableRow" colspan="4" scope="row">
              <div class="infoTeam">
                <div class="imageTeam">
                  <img class="iconTeam" src="data:image/png;base64, {{ $position->img }}">
                </div>
                <div class="nameTeam">
                  <span class="titleNameTeam">{{$position->team}}</span>
                </div>
              </div>
            </td>
            <td class="columTableRow">
              <span class="dataTeam">{{ $position->games }}</span>
            </td>
            <td class="columTableRow">
              <span class="dataTeam">{{ $position->win }}</span>
            </td>
            <td class="columTableRow">
              <span class="dataTeam">{{ $position->loss }}</span>
            </td>
            <td class="columTableRow">
              <span class="dataTeam">{{ $position->pct }}</span>
            </td>
            <td class="columTableRow">
              <span class="dataTeam">{{ $position->PF }}</span>
            </td>
            <td class="columTableRow">
              <span class="dataTeam">{{ $position->PA }}</span>
            </td>
            <td class="columTableRow">
              <span class="dataTeam">{{ $position->diff }}</span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
