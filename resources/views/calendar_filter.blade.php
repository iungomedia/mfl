@extends('layouts.app')

@section('content')
<div class="container">
  <h1 style="font-family: BigNoodleTitling; font-size:2.5rem">CALENDARIO</h1>
  {!! Form::open(['route' => ['calendario/filtro'], 'method' => 'post']) !!}
  <div class="row d-flex justify-content-left m-2">
    <div class="col-2">
      <div class="form-group">
        {{ Form::label('idCategory', 'CATEGORÍA', ['class' => 'font-weight-bold']) }}
        {{ Form::select('idCategory', $categories, null, ['class' => 'form-control', 'placeholder' => 'Todos']) }}
      </div>
    </div>

    <div class="col-2">
      <div class="form-group">
        {{ Form::label('idTeam', 'EQUIPO', ['class' => 'font-weight-bold']) }}
        {{ Form::select('idTeam', $teams, null, ['class' => 'form-control', 'placeholder' => 'Todos']) }}
      </div>
    </div>

    <div class="col-2">
      <div class="form-group">
        {{ Form::label('idJourney', 'JORNADA', ['class' => 'font-weight-bold']) }}
        {{ Form::select('idJourney', $journeys, null, ['class' => 'form-control', 'placeholder' => 'Todos']) }}
      </div>
    </div>

    <div class="col-2">
      <div class="form-group">
        {{ Form::label('lbl_button', 'Filtros', ['style' => 'color:transparent;']) }}
        {{ Form::submit('Filtrar', ['class' => 'btn btn-block btn-primary']) }}
      </div>
    </div>
  </div>
  {!! Form::close() !!}

  <div class="row d-flex justify-content-center m-0">
    <div class="card-deck">

      @foreach ($datesFiltered as $dateFiltered)
      <div class="col-4 mb-3">
        <div class="card border-dark">
          <div class="card-body">
            <table class="table-responsive table-sm">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th rowspan="2">
                    <img class="center" src="{{url('/images/calendar/'. $dateFiltered->teamOne . '.png')}}" alt="{{ $dateFiltered->teamOne }}" style="display: block;">
                  </th>

                  <td style="text-align:center; font-weight: bold;">{{ $dateFiltered->teamOne }} <br /> VS <br />{{ $dateFiltered->teamTwo }}</td>

                  <th rowspan="2">
                    <img class="center" src="{{url('/images/calendar/'. $dateFiltered->teamTwo . '.png')}}" alt="{{ $dateFiltered->teamTwo }}" style="display: block;">
                  </th>
                </tr>

              </tbody>
            </table>
            <div style="text-align:center;" class="card-footer border-dark">{{ $dateFiltered->date }} <br /> {{ $dateFiltered->category }} | Jornada {{ $dateFiltered->journey }}</div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
