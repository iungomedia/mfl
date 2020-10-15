@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="font-family: BigNoodleTitling; font-size:2.5rem">POSICIONES</h1>
    {!! Form::open(['route' => ['posiciones/filtro'], 'method' => 'post']) !!}
        <div class="row d-flex justify-content-left m-2">
            <div class="col-2">
                    <div class="form-group">
                        {{ Form::label('idCategory', 'CATEGORÍA', ['class' => 'font-weight-bold']) }}
                        {{ Form::select('idCategory', $categories, null, ['class' => 'form-control', 'placeholder' => 'Selecciona']) }}
                    </div>
                </div>

            <div class="col-2">
                    <div class="form-group">
                        {{ Form::label('idJourney', 'JORNADA', ['class' => 'font-weight-bold']) }}
                        {{ Form::select('idJourney', $journeys, null, ['class' => 'form-control', 'placeholder' => 'Selecciona']) }}
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
        <div class="col-10 mb-3" >
            <table class="table table-striped table-hover table-light table-bordered">
                <thead>
                    <tr>
                        <th colspan="4" scope="col"></th>
                        <th scope="col">G</th>
                        <th scope="col">P</th>
                        <th scope="col">E</th>
                        <th scope="col">PCT</th>
                        <th scope="col">PA</th>
                        <th scope="col">PC</th>
                        <th scope="col">DIPF</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($positionsFiltered as $positionFiltered)
                        <tr>
                            <th colspan="4" scope="row">
                                <img class="center" src="{{url('/images/positions/'. $positionFiltered->team . '.png')}}" alt="{{ $positionFiltered->team }}">
                            </th>
                            <td>{{ $positionFiltered->games }}</td>
                            <td>{{ $positionFiltered->win }}</td>
                            <td>{{ $positionFiltered->loss }}</td>
                            <td>{{ $positionFiltered->pct }}</td>
                            <td>{{ $positionFiltered->PF }}</td>
                            <td>{{ $positionFiltered->PA }}</td>
                            <td>{{ $positionFiltered->diff }}</td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    <div>
</div>

@endsection


