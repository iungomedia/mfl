@extends('layouts.mfl')

@section('content')

<div class="pagesResult containerMFL paddingTopPages">
    <div class="containerFilters">
        <h1 class="titlePages">RESULTADOS</h1>
        <form class="formFilters">
            <div class="itemFilter">
                {{ Form::label('idCategory', 'CATEGORÍA', ['class' => 'font-weight-bold']) }}
                {{ Form::select('idCategory', $categories, null, ['class' => 'form-control', 'placeholder' => 'Todos']) }}
            </div>
            <div class="itemFilter">
                {{ Form::label('idTeam', 'EQUIPO', ['class' => 'font-weight-bold']) }}
                {{ Form::select('idTeam', $teams, null, ['class' => 'form-control', 'placeholder' => 'Todos']) }}
            </div>
            <div class="itemFilter">
                {{ Form::label('idJourney', 'JORNADA', ['class' => 'font-weight-bold']) }}
                {{ Form::select('idJourney', $journeys, null, ['class' => 'form-control', 'placeholder' => 'Todos']) }}
            </div>
            <div class="itemFilter">
                {{ Form::label('lbl_button', 'Filtros', ['style' => 'color:transparent;']) }}
                {{ Form::submit('Filtrar', ['class' => 'btn btn-block btn-primary']) }}
            </div>
        </form>
    </div>
    <div class="containerCards">
        <div class="listCardsResult">
            @foreach ($games as $game)
                <div class="mix itemCardsResult {{strtolower(str_replace(' ','',$game->category))}} {{strtolower(str_replace(' ','',$game->teamOne))}} {{strtolower(str_replace(' ','',$game->teamTwo))}} {{strtolower(str_replace(' ','',$game->journey))}}">
                    <div class="containCardsResult">
                        <div class="headResult">
                            <div class="itemHeadResult">
                                <span class="categoryResult">{{ $game->category }}</span>
                            </div>
                            <div class="itemHeadResult">
                                <span class="journeyResult">{{ $game->journey }}</span>
                            </div>
                        </div>
                        <div class="bodyResult">
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
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection


